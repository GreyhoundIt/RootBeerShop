@extends('layouts.app')

@section('title')
Checkout
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


      {!! Form::open(array('route' => 'shop.checkout')) !!}
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}

        {{ Form::label('address', 'Address:') }}
        {{ Form::text('address', null, array('class' => 'form-control')) }}

        {{ Form::label('postcode', 'Post Code:') }}
        {{ Form::text('postcode', null, array('class' => 'form-control')) }}

        {{ Form::label('cardnumber', 'Card Number:') }}
        {{ Form::number('cardnumber', null, array('class' => 'form-control')) }}


        <div class="row">
          <div class="col-md-4">
            {{ Form::label('cvv', 'CVV:') }}
            {{ Form::number('cvv', null, array('class' => 'form-control')) }}
          </div>
          <div class="col-md-4">
            {{ Form::label('expiryMonth', 'Card Expiry Month:') }}
            {{ Form::selectMonth('expiryMonth', null, array('class' => 'form-control'))}}
          </div>
          <div class="col-md-4">
            {{ Form::label('expiryYear', 'Card Expiry Year:') }}
            {{ Form::selectRange('expiryYear', 2016, 2026, null, array('class' => 'form-control') ) }}
          </div>
        </div>

        {{ Form::submit('Buy Now', array('class' => 'btn btn-default btn-lg btn-block btn-form')) }}
      {!! Form::close() !!}

    </div>
  </div>

@endsection
