<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Providers;
use App\Http\Controllers\Post;



class CustomerController extends Controller
{
    /**.
     * 
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function __construct(){
    //     if (Auth::check()){
          
    //         return redirect()->route('user.signin');
    //     }
    // }



    public function index(Request $request)
    {
        $customer = Customer::get();

        if($request->has('view_deleted'))
        {
            $customer = Customer::onlyTrashed()->get();
        }

        return view('customer.index', compact('customer'));
     
    }

  


    // public function index()
    // {
       
    //     if (Auth::check()){
    //         $customer = Customer::all();
    //         return view('customer.index', compact('customer'));
            
    //     }

    //     return redirect()->route('user.signin');
       
    // }


    





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->validate([

            'lname' => 'required|max:255',
            'fname' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            

        ]);

        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images' ;
            $input['image'] = 'images/'.$fileName;

            $customer = Customer::create($input);
            $file->move($destinationPath,$fileName);
        }


        
        return redirect('/customers')->with('completed','Customer has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $customer = Customer::find($id);

        $input = $request->all();
        $request->validate([
            'lname' => 'required|max:255',
            'fname' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'image' => 'mimes:png,jpg,gif,svg',
       ]);


        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images' ;
            $input['image'] = 'images/'.$fileName;
            $file->move($destinationPath,$fileName);
        }
        
          $customer->lname = $request->lname;
          $customer->fname = $request->fname;
          $customer->address = $request->address;
          $customer->phone = $request->phone;
          $customer->image = $request->$fileName;

           
        $customer->update($input);
        return redirect('/customers')->with('success','Customer Updated Successfully');
       

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        // Customer::destroy($id);

        return redirect('/customers');
    }

    public function restore($id)
    {
        Customer::withTrashed()->find($id)->restore();

        return redirect('/customers');
    }

    public function restore_all()
    {
        $customer = Customer::onlyTrashed()->restore();

        return redirect('/customers');
    }
}
