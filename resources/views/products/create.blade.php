@extends('layouts.app')

@section('title')
  Create a Product
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <h1>Create New Product</h1>
      <hr>

      {!! Form::open(array('route' => 'products.store')) !!}
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}

        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}

        {{ Form::label('price', 'Price:') }}
        {{ Form::text('price', null, array('class' => 'form-control')) }}

        {{ Form::label('imageurl', 'Image URL:') }}
        {{ Form::text('imageurl', null, array('class' => 'form-control')) }}

        {{ Form::submit('Create Product', array('class' => 'btn btn-default btn-lg btn-block btn-form')) }}
      {!! Form::close() !!}
    </div>
  </div>

@endsection
