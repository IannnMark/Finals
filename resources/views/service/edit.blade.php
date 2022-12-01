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
    Edit Service's Data
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
      <form method="post" action="{{ route('services.update', $service->id) }}" enctype ="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('PUT')
              <label for="service_description">Service Description</label>
              <input type="text" class="form-control" name="service_description" value="{{ $service->service_description }}"/>
          </div>
          <div class="form-group">
              <label for="service_cost">Service Cost</label>
              <input type="text" class="form-control" name="service_cost" value="{{ $service->service_cost }}"/>
          </div>
          <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" class="form-control" id="image" name="image" placeholder="image">
                    <img src="{{asset($service->image) }}" width = "75px" height="75px"></td>
                </div>

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

