@extends('layouts.master')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<a href="{{route('diseases.create')}}" class="btn btn-primary">Add New Record</a>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Disease Description</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($disease as $disease)
        <tr>
            <td>{{$disease->id}}</td>
            <td>{{$disease->diseases}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection