@extends('layout.app')

@section('content')
<hr>
<div class="container">
    <div class="card" style="width: 70%;">
        <div class="card-body">
            <a href="/orders">Vrati se na pregled</a>
            <hr>
        <h5 class="card-title">Ime i prezime: {{$order->name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Kreirano: {{$order->created_at->format('d.m.Y')}} od strane korisnika: Frki</h6>
        <p class="card-text">Opis posiljke: {{$order->description}}</p>
        <p class="card-text">Zarada: {{$order->price}} KM</p>
        <p class="card-text">Interna napomena: {{$order->info}} </p>

            <hr>
        <h6 class="card-subtitle mb-2 text-danger">Zadnji put izmijenjeno: {{$order->updated_at}} od strane korisnika: Frki</h6>
          <div class="form-group">  
        <a href="\orders\{{$order->id}}/edit" class="btn btn-primary btn-sm">Izmijeni</a>
        {!! Form::open(['action'=>['OrdersController@destroy', $order->id], 'method'=> 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{ Form::submit('Obrisi',['class'=> 'btn btn-sm btn-danger']) }}
        {!! Form::close() !!}        </div>
    </div>
</div>
</div>

@endsection