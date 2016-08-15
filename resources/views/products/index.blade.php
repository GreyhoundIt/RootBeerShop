@extends('layouts.app')

@section('title')
  All Prducts
@endsection

@section('scripts')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/csshake/1.5.0/csshake.min.css">
@endsection

@section('content')
  <h1>All Products</h1>
  @foreach ($products->chunk(3) as $productsChunk)
    <div class="row">
      @foreach ($productsChunk as $product)
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="{{ $product->imageurl }}" alt="{{ $product->name }}" class="shake-slow">
            <div class="caption">
              <h3>{{ $product->name}}</h3>
              <p>{{ str_limit($product->description, $limit = 150, $end = '...') }}</p>
              <div class='cta clearfix'>
                <span class="price">£ {{ $product->price }}</span><br>
                <a href="{{ route('shop.addToCart' , $product->id)}}" class="btn btn-default pull-right" role="button">Add to Cart</a>
                <a href="{{ route('products.show' , $product->id)}}" class="btn btn-primary pull-right" role="button">See More</a>

                  @if (Auth::check() && Auth::user()->isAdmin)
                    <a href="{{ route('products.edit' , $product->id) }}" class="btn btn-warning pull-right edit-btn" role="button">Edit Product</a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['products.destroy', $product->id]
                    ]) !!}
                        {!! Form::submit('Delete this Product?', ['class' => 'btn btn-danger btn-lg btn-block btn-index']) !!}
                    {!! Form::close() !!}
                  @endif


              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endforeach

@endsection
