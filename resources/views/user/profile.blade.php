@extends('layouts.app')

@section('title')
  Profile
@endsection

@section('content')
  <h1>Profile</h1>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>{{ Auth::user()->name}}'s Profile</h1>
      <hr>
      <h2>My Orders</h2>
      @foreach($orders as $order)
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>individual Price</th>
              <th>Quantity</th>
              <th>Total Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order->cart->items as $product)
              <tr>
                <th>{{$product['item']['name']}}</th>
                <th>{{'£ ' . $product['item']['price']}}</th>
                <th>{{$product['qty']}}</th>
                <th>{{number_format($product['qty'] * $product['item']['price'], 2)}}</th>
              </tr>
            @endforeach
          </tbody>
        </table>
        <span>Total Price £ {{ number_format($order->cart->totalPrice, 2) }} </span>
        <hr>
      @endforeach
      </div>
    </div>

@endsection
