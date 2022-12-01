<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Providers;

class ServiceController extends Controller
{
    /**.
     * 
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $service = Service::get();

        if($request->has('view_deleted'))
        {
            $service = Service::onlyTrashed()->get();
        }

        return view('service.index', compact('service'));
    }


//     public function __construct(){
//         if (Auth::check()){
          
//             return redirect()->route('user.signin');
//         }
//     }


//   public function index()
//     {
       
//         if (Auth::check()){
//             $service = Service::all();
//             return view('service.index', compact('service'));
            
//         }

//         return redirect()->route('user.signin');
       
//     }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
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

            'service_description' => 'required|max:255',
            'service_cost' => 'required|max:255',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            

        ]);

        //     if($file = $request->hasFile('img_path')) {
        //     $file = $request->file('img_path') ;
        //     $fileName = $file->getClientOriginalName();
        //     $destinationPath = public_path().'/img_path' ;
        //     $input['img_path'] = 'img_path/'.$fileName;

        //     $customer = Customer::create($input);
        //     $file->move($destinationPath,$fileName);
        // }

        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images' ;
            $input['image'] = 'images/'.$fileName;

            $service = Service::create($input);
            $file->move($destinationPath,$fileName);
        }


        
        return redirect('/services')->with('completed','Service has been saved');
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
         
        $service = Service::find($id);
        return view('service.edit', compact('service'));
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

        $service = Service::find($id);

        $input = $request->all();
        $request->validate([
            'service_description' => 'required|max:255',
            'service_cost' => 'required|max:255',
            'image' => 'mimes:png,jpg,gif,svg',
       ]);


        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images' ;
            $input['image'] = 'images/'.$fileName;
            $file->move($destinationPath,$fileName);
        }
        
          $service->service_description = $request->service_description;
          $service->service_cost = $request->service_cost;
          $service->image = $request->$fileName;

           
        $service->update($input);
        return redirect('/services')->with('success','Services Updated Successfully');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();

        return redirect('/services');
    }

    public function restore($id)
    {
        Service::withTrashed()->find($id)->restore();

        return redirect('/services');
    }

    public function restore_all()
    {
        $service = Services::onlyTrashed()->restore();

        return redirect('/services');
    }
}