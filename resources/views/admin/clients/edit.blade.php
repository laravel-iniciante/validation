@extends('layouts.layout')

@section('content')
    <h3>Novo Cliente</h3>

    @include('form._form_errors');

    <form method="POST" action="{{route('clients.update',['client' => $client->id])}}">
        {{method_field('PUT')}}
        @include('admin.clients._form')

        <input type="submit" name="Enviar" class="btn btn-default">

    </form>

@endsection