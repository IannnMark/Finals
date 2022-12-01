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
    Add New Veterinary
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
      <form method="post" action="{{ route('veterinarians.store') }}" enctype ="multipart/form-data">
        @csrf
          <div class="form-group">
              @csrf
              <label for="fname">Last Name</label>
              <input type="text" class="form-control" name="lname"/>
          </div>
          <div class="form-group">
              <label for="lname">First Name</label>
              <input type="text" class="form-control" name="fname"/>
          </div>
         
         

     
          <button type="submit" class="btn btn-primary">Add New Veterinary</button>
      </form>
  </div>
</div>
@endsection
