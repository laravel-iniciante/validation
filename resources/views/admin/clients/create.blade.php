@extends('layouts.layout')

@section('content')
    <h3>Novo Cliente</h3>
    <form method="POST" action="{{route('clients.store')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label>Nome</label>
            <input class="form-control" type="text" name="name">
        </div>

        <div class="form-group">
            <label>Documet number</label>
            <input class="form-control" type="text" name="document_number">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="email">
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input class="form-control" type="text" name="phone">
        </div>

        <div class="form-group">
            <label>Estado civil</label>
            <select class="form-control" name="marital_state">
                <option value="">Selecione o estado civil</option>
                <option value="1">Solteiro</option>
                <option value="2">Casado</option>
                <option value="3">Divorciado</option>
            </select>
        </div>

        <div class="form-group">
            <label>Data de nascimento</label>
            <input class="form-control" type="date" name="date_birth">
        </div>

        <div class="radio">
            <label><input type="radio" name="sex" value="m">Masculino</label>
        </div>

        <div class="radio">
            <label><input type="radio" name="sex" value="f">Feminino</label>
        </div>

        <div class="form-group">
            <label>Deficiência física</label>
            <input class="form-control" type="text" name="physical_disability">
        </div>

        <div class="checkbox">
            <label></label>
            <input class="form-control" type="checkbox" name="defaulter"> Inadinplente
        </div>

        <input type="submit" name="Enviar" class="btn btn-default">

    </form>

@endsection