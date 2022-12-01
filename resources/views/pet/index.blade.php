@extends('layouts.master')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }

  .h3 {
    font-family:Arial Narrow;
    font-weight: bold;

  }
</style>

<div class="push-top">

<br />
<h1 class="text-center text-primary">Pet's Table</h1>
<br />

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
  @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-6">
                            
                            <a href="{{ route('pets.create')}}" class="
                            btn btn-primary btn-sm">Add New Pet</a></div>
                        <div class="col col-md-6 text-right">
                            @if(request()->has('view_deleted'))
                            <a href="{{ route('pets.index') }}" class="btn btn-info btn-sm">View All Records</a>
                            <a href="{{ route('pets.restore_all') }}" class="btn btn-success btn-sm">Restore All</a>
                            @else
                            <a href="{{ route('pets.index', ['view_deleted' => 'DeletedRecords']) }}" class="class=btn btn-danger btn-sm">View Deleted Records</a>
                            @endif
                            
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="table-warning">
                                    <th>Pet Id</th>
                                    <th>Image</th>
                                    <th>Pet Name</th>
                                    <th>Description</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Customer ID</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>

                            <tbody>

                            @if(count($pet) > 0)
                                @foreach($pet as $pet)

                                <tr>
                                    <td>{{ $pet->id }}</td>
                                    <td><img src="{{asset($pet->pet_image) }}" width = "75px" height="75px"></td>
                                    <td>{{ $pet->pet_name}}</td>
                                    <td>{{ $pet->description}}</td>
                                    <td>{{ $pet->pet_age}}</td>
                                    <td>{{ $pet->pet_gender}}</td>
                                    <td>{{ $pet->customer_id}}</td>
                                    
                                    <td align="center"><a href="{{ route('pets.edit',$pet->id) }}">
                                        <i class="fa-regular fa-pen-to-square" aria-hidden="true" style="font-size:24px" >
                                        </a></i></td>
                                        <td align="center">{!! Form::open(array('route' => array('pets.destroy',
                                            $pet->id),'method'=>'DELETE')) !!}
                                            <button ><i class="fa-solid fa-trash-can" style="font-size:24px; color:red" >
                                         </i></button>
                                    <td class="text-center">
                                        @if(request()->has('view_deleted'))

                                          <a href="{{route('pets.restore', $pet->id)}}" class="btn btn-success btn-sm">Restore</a>  
                                        @else
                                         
                                     
                                        @endif
                                    </td>
                                </tr>

                                @endforeach

                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No Records Found</td>
                                </tr>

                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

@endsection
