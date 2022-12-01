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
<h1 class="text-center text-primary">Consultation's Table</h1>
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
                            
                            <a href="{{ route('consultations.create')}}" class="btn btn-primary btn-sm">Add New Consultation</a></div>
                        {{-- <div class="col col-md-6 text-right">
                            @if(request()->has('view_deleted'))
                            <a href="{{ route('customers.index') }}" class="btn btn-info btn-sm">View All Records</a>
                            <a href="{{ route('customers.restore_all') }}" class="btn btn-success btn-sm">Restore All</a>
                            @else
                            <a href="{{ route('customers.index', ['view_deleted' => 'DeletedRecords']) }}" class="class=btn btn-danger btn-sm">View Deleted Records</a>
                            @endif
                            
                        </div> --}}
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="table-warning">
                                    <td>ID</td>
                                    <td>Veterinary ID</td>
                                    <td>Pet ID</td>
                                    <td>Reason ID</td>
                                    <td>Check Up Date</td>
                                    <td>Comments</td>
                                    <td>Cost</td>
                                    {{-- <th>Edit</th>
                                    <th>Delete</th> --}}
                                    
                                </tr>
                            </thead>

                            <tbody>

                            @if(count($consultation) > 0)
                                @foreach($consultation as $consultation)

                                <tr>
                                    <td>{{ $consultation->id }}</td>
                                    
                                    <td>{{$consultation->veterinary_id}}</td>
                                    <td>{{$consultation->pet_id}}</td>
                                    <td>{{$consultation->disease_id}}</td>
                                    <td>{{$consultation->checkup_date}}</td>
                                    <td>{{$consultation->comments}}</td>
                                    <td>{{$consultation->cost}}</td>
                                    {{-- <td align="center"><a href="{{ route('consultations.edit',$customer->id) }}">
                                        <i class="fa-regular fa-pen-to-square" aria-hidden="true" style="font-size:24px" >
                                        </a></i></td>
                                        <td align="center">{!! Form::open(array('route' => array('customers.destroy',
                                            $customer->id),'method'=>'DELETE')) !!}
                                            <button ><i class="fa-solid fa-trash-can" style="font-size:24px; color:red" >
                                         </i></button> --}}

{{--                                         
                                    <td class="text-center">
                                        @if(request()->has('view_deleted'))

                                          <a href="{{route('customers.restore', $customer->id)}}" class="btn btn-success btn-sm">Restore</a>  
                                        @else
                                         

                                        @endif
                                    </td> --}}
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
