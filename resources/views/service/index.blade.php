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
<h1 class="text-center text-primary">Service's Table</h1>
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
                            
                            <a href="{{ route('services.create')}}" class="btn btn-primary btn-sm">Add New Service</a></div>
                        <div class="col col-md-6 text-right">
                            @if(request()->has('view_deleted'))
                            <a href="{{ route('services.index') }}" class="btn btn-info btn-sm">View All Records</a>
                            <a href="{{ route('services.restore_all') }}" class="btn btn-success btn-sm">Restore All</a>
                            @else
                            <a href="{{ route('services.index', ['view_deleted' => 'DeletedRecords']) }}" class="class=btn btn-danger btn-sm">View Deleted Records</a>
                            @endif
                            
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="table-warning">
                                    <th>Id</th>
                                    <th>Photo</th>
                                    <th>Service Description</th>
                                    <th>Service Cost</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>

                            <tbody>

                            @if(count($service) > 0)
                                @foreach($service as $service)

                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td><img src="{{asset($service->image) }}" width = "75px" height="75px"></td>
                                    <td>{{ $service->service_description}}</td>
                                    <td>{{ $service->service_cost}}</td>
                                    <td align="center"><a href="{{ route('services.edit',$service->id) }}">
                                        <i class="fa-regular fa-pen-to-square" aria-hidden="true" style="font-size:24px" >
                                        </a></i></td>
                                        <td align="center">{!! Form::open(array('route' => array('services.destroy',
                                            $service->id),'method'=>'DELETE')) !!}
                                            <button ><i class="fa-solid fa-trash-can" style="font-size:24px; color:red" >
                                         </i></button>
                                    <td class="text-center">
                                        @if(request()->has('view_deleted'))

                                          <a href="{{route('services.restore', $service->id)}}" class="btn btn-success btn-sm">Restore</a>  
                                        @else
                                         
                                          {{-- <td align="center"><a href="{{ route('customers.edit',$customer->id) }}">
                                            <i class="fa-regular fa-pen-to-square" aria-hidden="true" style="font-size:24px" >
                                            </a></i></td> --}}
                                          
                                            {{-- <td align="center">{!! Form::open(array('route' => array('customers.destroy',
                                                $customer->id),'method'=>'DELETE')) !!}
                                                <button ><i class="fa-solid fa-trash-can" style="font-size:24px; color:red" >
                                             </i></button> --}}
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
