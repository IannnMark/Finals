<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Pet;
use App\Models\Customer;
use Illuminate\Http\Request;
use View;
use Redirect;
use Illuminate\Support\Facades\File;
use App\Providers;
use App\Http\Controllers\Post;

class PetController extends Controller
{

    public function index(Request $request)
    {
        $pet = Pet::get();

        if($request -> has('view_deleted'))
        {
            $pet = Pet::onlyTrashed()->get();
        }

        return view('pet.index', compact('pet'));
    }

//     public function __construct(){
//         if (Auth::check()){
          
//             return redirect()->route('user.signin');
//         }
//     }


//   public function index()
//     {
       
//         if (Auth::check()){
//             $pet = Customer::all();
//             return view('pet.index', compact('pet'));
            
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
        
     $customer = Customer::pluck('fname','id');
  
     return View::make('pet.create', compact('customer'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 'pet_name','owner_name','description','pet_age','pet_gender','pet_img'
    public function store(Request $request)
    {

        $input = $request->validate([

            'pet_name' => 'required|max:255',
            'description' => 'required|max:255',
            'pet_age' => 'required|max:255',
            'pet_gender' => 'required|max:255',
            'pet_image' => 'mimes:jpeg,png,jpg,gif,svg',
            'customer_id' => 'required|max:255',
          

        ]);

        if($file = $request->hasFile('pet_image')) {
            $file = $request->file('pet_image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images' ;
            $input['pet_image'] = 'images/'.$fileName;

            
            $pet = Pet::create($input);
            $file->move($destinationPath,$fileName);
 }

         return redirect('/pets')->with('Success!', 'Pet Record Save!');
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
        // $pet = Pet::findOrFail($id);
        // return view('pet.edit');
          
        $pet = Pet::find($id);
        return view('pet.edit', compact('pet'));
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
        $pet = Pet::find($id);

        $input = $request->all();
        $request->validate([
            'pet_name' => 'required|max:255',
            'description' => 'required|max:255',
            'pet_age' => 'required|max:255',
            'pet_gender' => 'required|max:255',
            'pet_image' => 'mimes:jpeg,png,jpg,gif,svg',
            // 'customer_id' => 'required|max:255',
       ]);

       if($file = $request->hasFile('pet_image')) {
        $file = $request->file('pet_image') ;
        $fileName = $file->getClientOriginalName();
        $destinationPath = public_path().'/images' ;
        $input['pet_image'] = 'images/'.$fileName;
        $file->move($destinationPath,$fileName);
    }

    $pet->pet_name = $request->pet_name;
    $pet->description = $request->description;
    $pet->pet_age = $request->pet_age;
    $pet->pet_gender = $request->pet_gender;
    $pet->pet_image = $request->$fileName;
    // $pet->customer_id = $request->customer_id;

     
  $pet->update($input);
  return redirect('/pets')->with('success','Pet Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pet::find($id)->delete();

        return redirect('/pets');

    }

    public function restore($id)
    {
        Pet::withTrashed()->find($id)->restore();

        return redirect('/pets');
    }

    public function restore_all()
    {
        $pet = Pet::onlyTrashed()->restore();

        return redirect('/pets');
    }
    
}
