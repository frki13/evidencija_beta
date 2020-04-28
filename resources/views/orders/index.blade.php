@extends('layout.app')


@section('content')
    @if (count($orders) > 0)
        <hr>
    <div class="container">
      <div class="table-responsive">
  <table class="table table-bordered table-striped">
      <thead class=" table-dark">
          <tr style="text-align:center">
            <th scope="col">ID</th>
            <th scope="col">Ime i prezime</th>
            <th scope="col">Opis posiljke</th>
            <th scope="col">Zarada</th>
            <th scope="col">Interna napomena</th>
            <th scope="col">Datum kreiranja</th>
            <th scope="col">Operacije</th>
  
          </tr>
        </thead>
  
      @foreach ($orders as $order)
  
  
                <tr style="text-align:center">
                  <th>{{$order->id}}</th>
                  <td> <a href="\orders\{{$order->id}}">{{$order->name}}</a></td>
                  <td>{{$order->description}}</td>
                  <td>{{$order->price}}</td>
                  <td>{{$order->info}}</td>
                  <td>{{$order->created_at->format('d.m.Y')}}</td>
                  <td><a type="button" class="btn btn-sm btn-primary " href="\orders\{{$order->id}}/edit">Izmijeni</a>
                    {!! Form::open(['action'=>['OrdersController@destroy', $order->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::submit('Obrisi',['class'=> 'btn btn-sm btn-danger']) }}
                    {!! Form::close() !!} </td>
                </tr>
              </div>
          </div>
      @endforeach
          {{ $orders->links() }}
  

    @else
    <div class="container">
        <h1>Nema posiljki u bazi podataka</h1>
    </div>
    @endif
@endsection