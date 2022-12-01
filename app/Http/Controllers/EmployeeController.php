<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Providers;
use App\Http\Controllers\Post;

class EmployeeController extends Controller
{

    public function __construct(){
        if (Auth::check()){
          
            return redirect()->route('user.signin');
        }
    }


    public function index(Request $request)
    {
        $employee = Employee::get();

        if($request->has('view_deleted'))
        {
            $employee = Employee::onlyTrashed()->get();
        }

        return view('employee.index', compact('employee'));
    }


    // public function index()
    // {
       
    //     if (Auth::check()){
    //         $employee= Employee::all();
    //         return view('employee.index', compact('employee'));
            
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
        return view('employee.create');
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

            $employee = Employee::create($input);
            $file->move($destinationPath,$fileName);
        }


        
        return redirect('/employees')->with('completed','Employee has been saved!');
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
         
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
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
        $employee = Employee::find($id);

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

    $employee->lname = $request->lname;
    $employee->fname = $request->fname;
    $employee->address = $request->address;
    $employee->phone = $request->phone;
    $employee->image = $request->$fileName;

     
  $employee->update($input);
  return redirect('/employees')->with('success','Employee Updated Successfully');

        

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();

        return redirect('/employees');
    }

    public function restore($id)
    {
        Employee::withTrashed()->find($id)->restore();

        return redirect('/employees');
    }

    public function restore_all()
    {
        $employee = Employee::onlyTrashed()->restore();

        return redirect('/employees');
    }
}
