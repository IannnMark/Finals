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
    Add New Disease or Injury
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
      <form method="post" action="{{ route('diseases.store') }}" enctype ="multipart/form-data">
        @csrf
          <div class="form-group">
              @csrf
              <label for="disease">Disease Or Injury</label>
              <input type="text" class="form-control" name="diseases"/>
          </div>
         
   
  </div>
          <button type="submit" class="btn btn-primary">Add New Disease</button>
      </form>
  </div>
</div>
@endsection
