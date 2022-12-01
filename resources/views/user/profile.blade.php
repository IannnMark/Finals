@extends('layouts.master')

@section('content')
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
            {{-- <a href="{{route('customers.index')}}" class="btn btn-block btn-danger">Customer</a>
            <a href="{{route('employees.index')}}" class="btn btn-block btn-danger">Employee</a>
            <a href="{{route('pets.index')}}" class="btn btn-block btn-danger">Pets</a>
            <a href="{{route('services.index')}}" class="btn btn-block btn-danger">Services</a> --}}
               {{-- <h1>User Profile</h1> --}}
              {{-- <p>{{Auth::user()->email}}</p>  --}}
             
          </div>
      </div>
      @endsection

