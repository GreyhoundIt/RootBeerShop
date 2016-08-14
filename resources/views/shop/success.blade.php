@extends('layouts.app')

@section('title')
  Success
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <h1> Thank you {{ Auth::user()->name}}</h1>
      <p>
        Your order has been placed.</br>
        
      </p>
      <a href="{{ url('/logout') }}">Sign out</a> or
      <a href="{{ url('/') }}">Continue shopping</a>
    </div>
  </div>
@endsection
