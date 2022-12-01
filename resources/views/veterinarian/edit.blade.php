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
    Edit Veterinarian's Data
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
      <form method="post" action="{{ route('veterinarians.update', $veterinarian->id) }}" enctype ="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('PUT')
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" value="{{ $veterinarian->lname }}"/>
          </div>
          <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" value="{{ $veterinarian->fname }}"/>
          </div>
         

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection