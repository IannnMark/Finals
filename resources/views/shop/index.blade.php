@extends('layouts.master')
{{-- @section('content')
	Acme Pet Clinic
@endsection --}}
    
@section('content')

@foreach ($service->chunk(2) as $serviceChunk)
<div class="row">
    @foreach ($serviceChunk as $service)
    <div class="thumbnail">
        <img src="{{$service->image}}"  alt="..." class="img-responsive">

        <div class="caption">
            <h3>{{$service->service_description}}<span>${{ $service->service_cost}}</span></h3>

            <div class="clearfix">
            <a href="{{ route('shops.addToCart', ['id'=>$service->id])}}" class="btn btn-primary" role="button"> <i class="fas fa-info"></i>Add to Cart</a>
                <a href="#" class="btn btn-default pull-right" role="button">
                    <i class="fas fa-info"></i>More Info</a>
            </div>
        </div>
    </div>
</div>
         @endforeach
     @endforeach
@endsection