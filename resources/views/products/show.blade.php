@extends('layouts.app')

@section('title')
  {{ $product->name }}
@endsection

@section('scripts')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/csshake/1.5.0/csshake.min.css">
@endsection

@section('content')

<div class="row">
  <h1>{{ $product->name }}</h1>
  <div class="col-md-6 col-md-offset-2">
    <img src="{{ $product->imageurl }}" alt="{{ $product->name }}" class="shake-slow" >
  </div>

  <div class="col-md-4">

    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">{{ $product->name  }}</h3>
      </div>
      <div class="panel-body">
        {{ $product->description }}

         <div class="panel-footer clearfix">
           <span class="price">£ {{ $product->price }}</span><br>
           <a href="{{ route('shop.addToCart' , $product->id) }}" class="btn btn-default pull-right" role="button">Add to Cart</a>
           <!-- Check if user is logged in and is an Admin -->
           @if (Auth::check() && Auth::user()->isAdmin)
             <a href="{{ route('products.edit' , $product->id) }}" class="btn btn-warning " role="button">Edit Product</a>
             <!-- Form to delete product -->
             {!! Form::open([
                 'method' => 'DELETE',
                 'route' => ['products.destroy', $product->id]
             ]) !!}
                 {!! Form::submit('Delete this Product?', ['class' => 'btn btn-danger btn-lg btn-block btn-form']) !!}
             {!! Form::close() !!}
           @endif
         </div>

      </div>
    </div>
  </div>
</div>


@endsection
