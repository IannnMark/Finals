@extends('layouts.master')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>



<div class="card push-top">
  <div class="card-header">
    Add New Consultation
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('consultations.store') }}" enctype ="multipart/form-data">
        @csrf
        <div class="form-group"> 
            <label for="veterinary_id" class="form-control"><h5>Veterinary's Name</h5></label>
            <select class="form-select" name="veterinary_id" id ="fname">
              @foreach($veterinary as $id=> $veterinary ) 
            <option value="{{$id}}">{{$veterinary }}</option>
            @endforeach
            </select>
            </div> 

            <div class="form-group"> 
                <label for="pet_id" class="form-control"><h5>Pet's Name</h5></label>
                <select class="form-select" name="pet_id" id ="pet_name">
                  @foreach($pet as $id=> $pet) 
                <option value="{{$id}}">{{$pet}}</option>
                @endforeach
                </select>
                </div> 

                <div class="form-group"> 
                    <label for="disease_id" class="form-control"><h5>Pet's Disease</h5></label>
                    <select class="form-select" name="disease_id" id ="diseases">
                      @foreach($disease as $id=> $disease) 
                    <option value="{{$id}}">{{$disease}}</option>
                    @endforeach
                    </select>
                    </div> 

                    <div class="form-group">
                        <label for="checkup_date"><h5>Date</h5></label>
                        <input type="Date" class="form-control" name="checkup_date"/>
                    </div>

                    <div class="form-group">
                        <label for="comments"><h5>Comments</h5></label>
                        <input type="text" class="form-control" name="comments">
                    </div>
         
                    <div class="form-group">
                        <label for="cost"><h5>Check up Cost</h5></label>
                        <input type="text" class="form-control" name="cost">
                    </div>
    




     
          <button type="submit" class="btn btn-primary">Add New Consultation</button>
      </form>
  </div>
</div>
@endsection
