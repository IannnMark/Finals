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
<h1 class="text-center text-primary">Customer's Table</h1>
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
                            
                            <a href="{{ route('customers.create')}}" class="btn btn-primary btn-sm">Add New Customer</a></div>
                        <div class="col col-md-6 text-right">
                            @if(request()->has('view_deleted'))
                            <a href="{{ route('customers.index') }}" class="btn btn-info btn-sm">View All Records</a>
                            <a href="{{ route('customers.restore_all') }}" class="btn btn-success btn-sm">Restore All</a>
                            @else
                            <a href="{{ route('customers.index', ['view_deleted' => 'DeletedRecords']) }}" class="class=btn btn-danger btn-sm">View Deleted Records</a>
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
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>

                            <tbody>

                            @if(count($customer) > 0)
                                @foreach($customer as $customer)

                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td><img src="{{asset($customer->image) }}" width = "75px" height="75px"></td>
                                    <td>{{ $customer->lname}}</td>
                                    <td>{{ $customer->fname}}</td>
                                    <td>{{ $customer->address}}</td>
                                    <td>{{ $customer->phone}}</td>
                                    {{-- <td align="center"><a href="{{ route('customers.edit',$customer->id) }}">
                                        <i class="fa-regular fa-pen-to-square" aria-hidden="true" style="font-size:24px" >
                                        </a></i></td> --}}

                                        <td align="center">
                                            @if($customer->deleted_at)
                                              <ii class="fas fa-user-edit" aria-hidden="true" style="font-size:24px; color:gray" ></i></a>
                                            @else
                                            <a href="{{route('customers.edit',$customer->id)}}">
                                              <i class="fas fa-user-edit" aria-hidden="true" style="font-size:24px" ></i></a>
                                            @endif
                                             </td>

                                        {{-- <td align="center">{!! Form::open(array('route' => array('customers.destroy',
                                            $customer->id),'method'=>'DELETE')) !!}
                                            <button ><i class="fa-solid fa-trash-can" style="font-size:24px; color:red" >
                                         </i></button> --}}
                                         <td align="center">
                                            @if($customer->deleted_at)
                                                <i class="fas fa-user-times" style="font-size:24px; color:gray" ></i>
                                            @else
                                                {!! Form::open(array('route' => array('customers.destroy', $customer->id),'method'=>'DELETE')) !!}
                                               <button ><i class="fas fa-user-times" style="font-size:20px; color:red" ></i></button>
                                               {!! Form::close() !!}
                                             @endif
                                           </td>

                                        
                                    <td class="text-center">
                                        @if(request()->has('view_deleted'))

                                          <a href="{{route('customers.restore', $customer->id)}}" class="btn btn-success btn-sm">Restore</a>  
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
