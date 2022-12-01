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
    Add New Pet
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
      <form method="post" action="{{ route('pets.store') }}" enctype ="multipart/form-data">
        @csrf
          <div class="form-group">
              @csrf
              <label for="pet_name">Pet Name</label>
              <input type="text" class="form-control" name="pet_name"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="pet_age">Pet Age</label>
              <input type="text" class="form-control" name="pet_age"/>
          </div>
          <div class="form-group">
            <label for="pet_gender">Pet Gender</label>
            <input type="text" class="form-control" name="pet_gender"/>
        </div>

        
        <div class="form-group">
            <label for="pet_image" class="control-label">Pet Image</label>
            <input type="file" class="form-control" id="pet_image" name="pet_image">
            @error('images')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
     
    </div>

   <div class="form-group"> 
   
    <label for="customer_id" class="control-label">Customer ID</label>

  <select class="form-select" name="customer_id" id="customer_id">
    @foreach($customer as $id => $customer)
    <option value="{{$id}}">{{$customer}}</option>
    @endforeach
</select> 
  </div> 

          <button type="submit" class="btn btn-primary">Add New Pet</button>
      </form>
  </div>
</div>
@endsection
