@extends('layout.app')

@section('content')
<div class="jumbotron">
    <h1>Unos nove posiljke</h1>
    {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Ime i prezime kupca')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Zarada')}}
            {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Unesi cijeli broj npr: 22'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Opis posiljke')}}
            {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Opis'])}}
        </div>

        <div class="form-group">
            {{Form::label('info', 'Interna napomena:')}}
            {{Form::text('info', '', ['class' => 'form-control', 'placeholder' => 'interna napomena'])}}
        </div>




        {{Form::submit('Snimi', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection