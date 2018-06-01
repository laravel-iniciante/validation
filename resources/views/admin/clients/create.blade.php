@extends('layouts.layout')

@section('content')
    <h3>Novo Cliente</h3>
    <h4>{{$clientType == \App\Client::TYPE_INDIVIDUAL ? 'Pessoa Física' : 'Pessoa juridica'}}</h4>

    @include('form._form_errors')

    <a href="{{route('clients.create', ['client_type' => \App\Client::TYPE_INDIVIDUAL])}}">Pessoa Física</a> |
    <a href="{{route('clients.create', ['client_type' => \App\Client::TYPE_LEGAL])}}">Pessoa Jurídica</a>

    <form method="POST" action="{{route('clients.store')}}">
        {{csrf_field()}}
        @include('admin.clients._form')

        <input type="submit" name="Enviar" class="btn btn-default">

    </form>

@endsection
