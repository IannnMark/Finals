<?php

namespace App\Http\Controllers;
use App\Models\Veterinarian;
use App\Models\Pet;
use App\Models\Disease;
use View;
use DB;
use Redirect;
use Illuminate\Http\Request;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultation = Consultation::all();
        return view('consultation.index', compact('consultation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $veterinary = Veterinarian::pluck('fname','id');

        $pet = Pet::pluck('pet_name','id');
        
        $disease = Disease::pluck('diseases','id');

        return View::make('consultation.create', compact('pet','disease','veterinary'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $consultation = new Consultation();
            
            $consultation->veterinary_id = $request->veterinary_id;
            $consultation->pet_id = $request->pet_id;
            $consultation->disease_id = $request->disease_id;
            $consultation->checkup_date = now();
           
            $consultation->comments = $request->comments;
            $consultation->cost = $request->cost;

            $consultation->save();


        }catch (Exception $e){

            DB::rollBack();

            return redirect()->route('consultations.create')->with('Transaction Failed', $e->getMessage());
        }

        DB::commit();

        return redirect()->route('consultations.index')->with('Transaction Success!!');
    
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
