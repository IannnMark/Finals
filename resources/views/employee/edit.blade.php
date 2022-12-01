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
    Edit Customer's Data
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
      <form method="post" action="{{ route('employees.update', $employee->id) }}" enctype ="multipart/form-data"
          <div class="form-group">
              @csrf
              @method('PUT')
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" value="{{ $employee->lname }}"/>
          </div>
          <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" value="{{ $employee->fname }}"/>
          </div>
          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" value="{{ $employee->address }}"/>
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}"/>
        </div>

          <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" class="form-control" id="image" name="image" placeholder="image">
                    <img src="{{asset($employee->image) }}" width = "75px" height="75px"></td>
                </div>

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

