@extends('layouts.layout')
@section('content')

    <h3>Ver Cliente</h3>
    <br/><br/>
    <a class="btn btn-primary" href="{{route('clients.edit',['client' => $client->id])}}">Ver</a>
    <table class="table table-bordered">

        <tbody>

            <tr>
                <th scope="row">ID</th>
                <td>{{ $client->id }}</td>
            </tr>
            <tr>
                <th scope="row">Nome</th>
                <td>{{ $client->name }}</td>
            </tr>
            <tr>
                <th scope="row">Documento</th>
                <td>{{ $client->document_number }}</td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>{{ $client->email }}</td>
            </tr>
            <tr>
                <th scope="row">Telefone</th>
                <td>{{ $client->phone }}</td>
            </tr>
            <tr>
                <th scope="row">Estado civil</th>
                <td>

                @switch($client->marital_status)
                    @case(1)
                        Solteiro
                        @break
                    @case(2)
                        Casado
                        @break
                    @case(3)
                        Divorciado
                        @break
                @endswitch

                </td>
            </tr>
            <tr>
                <th scope="row">Data nasc.</th>
                <td>{{ $client->date_birth }}</td>
            </tr>
            <tr>
                <th scope="row">Sexo</th>
                <td>{{ $client->sex == 'm' ? 'Masculino' : 'Feminino'}}</td>
            </tr>
            <tr>
                <th scope="row">Def. física</th>
                <td>{{ $client->physical_disability }}</td>
            </tr>
            <tr>
                <th scope="row">Inadimplete</th>
                <td>{{ $client->defaulter ? 'Sim' : 'Não'}}</td>
            </tr>
        </tbody>
    </table>

@endsection