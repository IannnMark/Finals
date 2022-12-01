<?php

namespace App\Http\Controllers;

use App\Models\Veterinarian;
use Illuminate\Http\Request;

class VeterinarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $veterinarian = Veterinarian::all();
       return view('veterinarian.index', compact('veterinarian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veterinarian.create');
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
            
        ]);

        
        $veterinarian = Veterinarian::create($input);
        return redirect('/veterinarians')->with('completed','Customer has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $veterinarian = Veterinarian::find($id);
        return view('veterinarian.edit', compact('veterinarian'));
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
        
        $veterinarian = Veterinarian::find($id);

        $input = $request->all();
        $request->validate([
            'lname' => 'required|max:255',
            'fname' => 'required|max:255',
           
           
       ]);
         
       $veterinarian->lname = $request->lname;
       $veterinarian->fname = $request->fname;
        $veterinarian->update($input);
        return redirect('/veterinarians')->with('success',
        'veterinarians Updated Successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Veterinarian::find($id)->delete();
  

        return redirect('/veterinarians');
    }


   
}
