@extends('layout.app')

@section('content')
<div class="jumbotron">
    <h1>Izmjena posijke</h1>
    {!! Form::open(['action'=>['OrdersController@update',$order->id],'method'=>'POST']) !!}
            <div class="form-group">
            {{Form::label('name', 'Ime i prezime kupca')}}
            {{Form::text('name', $order->name, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Zarada')}}
            {{Form::text('price', $order->price, ['class' => 'form-control', 'placeholder' => 'Unesi cijeli broj npr: 22'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Opis posiljke')}}
            {{Form::text('description', $order->description, ['class' => 'form-control', 'placeholder' => 'Opis'])}}
            {{ Form::hidden('_method', 'PUT') }}
        </div>

        <div class="form-group">
            {{Form::label('info', 'Interna napomena:')}}
            {{Form::text('info', $order->info, ['class' => 'form-control', 'placeholder' => 'interna napomena'])}}
        </div>




        {{Form::submit('Snimi', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection