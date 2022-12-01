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
    Add New Service
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
      <form method="post" action="{{ route('services.store') }}" enctype ="multipart/form-data">
        @csrf
          <div class="form-group">
              @csrf
              <label for="service_description">Service Description</label>
              <input type="text" class="form-control" name="service_description"/>
          </div>
          <div class="form-group">
              <label for="service_cost">Service Cost</label>
              <input type="text" class="form-control" name="service_cost"/>
          </div>
         
          <div class="form-group">
          <label for="image" class="control-label">Customer Image</label>
          <input type="file" class="form-control" id="image" name="image">
          @error('images')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
   
  </div>
          <button type="submit" class="btn btn-primary">Add Service</button>
      </form>
  </div>
</div>
@endsection
