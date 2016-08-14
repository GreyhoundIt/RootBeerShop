@extends('layouts.app')

@section('title')
  Shopping Cart
@endsection

@section('content')
  @if(Session::has('cart'))
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>individual Price</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          @foreach ($products as $product)
            <tr>
              <th>{{$product['item']['name']}}</th>
              <th>{{'£ ' . $product['item']['price']}}</th>
              <th>
                <a href="{{ route('shop.reduceByOne', ['id' => $product['item']['id']]) }}" type="button" class="btn btn-default btn-sm">-</a>
                {{$product['qty']}}
                <a href="{{ route('shop.addToCart', ['id' => $product['item']['id']]) }}" type="button" class="btn btn-default btn-sm">+</a>
              </th>
              <th>{{number_format($product['qty'] * $product['item']['price'], 2)}}</th>
              <th><a href="{{ route('shop.removeFromCart', ['id' => $product['item']['id']]) }}" type="button" class="btn btn-danger btn-sm"> X Remove</a>
              </th>
            </tr>

          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2 clearfix">
        <h3 class="pull-right">Total Price £ {{ number_format($total, 2) }}</h3>
      </div>
      <div class="col-md-8 col-md-offset-2 ">
        <a href="{{ route('products.index') }}" type="button" class="btn btn-default btn-block btn-lg">Continue Shopping</a>
        <a href="{{ route('shop.checkout') }}" type="button" class="btn btn-success btn-block btn-lg">Checkout</a>
        <a href="{{ route('shop.emptyCart') }}" type="button" class="btn btn-danger btn-block btn-lg">Empty Cart</a>
      </div>
    </div>




  @else
    <div class="row">
      <div class="col-md-8 col-md-offset-2 clearfix">
        <strong>Your Cart is Empty</strong>
      </div>
    </div>
  @endif

@endsection
