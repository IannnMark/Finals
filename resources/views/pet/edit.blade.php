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
    Edit Pet's Data
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
      <form method="post" action="{{ route('pets.update', $pet->id) }}" enctype ="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('PUT')
              <label for="pet_name">Pet Name</label>
              <input type="text" class="form-control" name="pet_name" value="{{ $pet->pet_name }}"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="{{ $pet->description }}"/>
          </div>
          <div class="form-group">
              <label for="pet_age">Pet Age</label>
              <input type="text" class="form-control" name="pet_age" value="{{ $pet->pet_age }}"/>
          </div>
          <div class="form-group">
            <label for="pet_gender">Pet Gender</label>
            <input type="text" class="form-control" name="pet_gender" value="{{ $pet->pet_gender }}"/>
        </div>

        {{-- <div class="form-group"> 
            <label for="customer_id" class="form-control">Customer ID</label>
            <select class="form-select" name="customer_id" id ="id">
              @foreach($customer as $id=> $customer) 
           <option value="{{$id}}">{{$customer}}</option>
       @endforeach
     </select>
   </div>   --}}

   {{-- <div class="row">
    <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="customer_id">Customer ID:</label>
        {!! Form::select('customer_id',$customer, $pet->customer_id,['class' => 'form-control form-select']) !!}
      </div>
</div> --}}

          <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" class="form-control" id="pet_image" name="pet_image" placeholder="image">
                    <img src="{{asset($pet->image) }}" width = "75px" height="75px"></td>
                </div>

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

