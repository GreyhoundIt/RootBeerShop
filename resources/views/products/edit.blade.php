@extends('layouts.app')

@section('title')
  Edit {{ $product->name }}
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
      <h1>Editing {{ $product->name }}</h1>
      <hr>
      {!! Form::model($product, ['route' => ['products.update', $product->id], 'method'=>'patch']) !!}

        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}

        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}

        {{ Form::label('price', 'Price:') }}
        {{ Form::text('price', null, array('class' => 'form-control')) }}

        {{ Form::label('imageurl', 'Image URL:') }}
        {{ Form::text('imageurl', null, array('class' => 'form-control')) }}

        {{ Form::submit('Update Product', array('class' => 'btn btn-default btn-lg btn-block btn-form')) }}
        {!! Html::linkRoute('products.show', 'Cancel', array($product->id), array('class' => 'btn btn-warning btn-lg btn-block btn-form')) !!}
      {!! Form::close() !!}

      {!! Form::open([
          'method' => 'DELETE',
          'route' => ['products.destroy', $product->id]
      ]) !!}
          {!! Form::submit('Delete this Product?', ['class' => 'btn btn-danger btn-lg btn-block btn-form']) !!}
      {!! Form::close() !!}
    </div>
  </div>



@endsection
