@extends('layouts.master')
@section('content')
    Acme Pet Services
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                @foreach($service as $service)
                <li class="list-group-item">
                 <span class="badge">{{ $service['qty'] }}</span>
                  <strong>{{ $service['service']['service_description'] }}</strong>
                    <strong>{{ $service['service']['service_cost'] }}</strong>
                    <div class="btn-group">
              <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></button>
             <ul class="dropdown-menu">
<li><a href="{{ route('shop.reduceByOne',['id'=>$service['service']['service_id']]) }}">Reduce By 1</a></li>
<li><a href="{{ route('shop.remove',['id'=>$service['service']['service_id']]) }}">Reduce All</a></li>
            </ul>
                </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Services Are being Avail!</h2>
            </div>
        </div>
    @endif
@endsection