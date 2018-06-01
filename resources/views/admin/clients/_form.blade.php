
{{csrf_field()}}

<div class="form-group">
    <label>Nome</label>
    <input class="form-control" type="text" name="name" value="{{old('name',$client->name)}}">
</div>

<div class="form-group">
    <label>Documet number</label>
    <input class="form-control" type="text" name="document_number" value="{{old('document_number',$client->document_number)}}">
</div>

<div class="form-group">
    <label>Email</label>
    <input class="form-control" type="email" name="email" value="{{old('email',$client->email)}}">
</div>

<div class="form-group">
    <label>Telefone</label>
    <input class="form-control" type="text" name="phone" value="{{old('phone',$client->phone)}}">
</div>

@if($clientType == \App\Client::TYPE_INDIVIDUAL)
    <div class="form-group">
        <label>Data de nascimento</label>
        <input class="form-control" type="date" name="date_birth" value="{{old('date_birth',$client->date_birth)}}">
    </div>
    <div class="form-group">
        @php
            $maritalStatus = $client->marital_status;
        @endphp

        <label>Estado civil</label>
        <select class="form-control" name="marital_state">
            <option value="">Selecione o estado civil </option>
            <option value="1" {{old('marital_state', $maritalStatus) == '1' ? 'selected="selected"' : ''}}>Solteiro</option>
            <option value="2" {{old('marital_state', $maritalStatus) == '2' ? 'selected="selected"' : ''}}>Casado</option>
            <option value="3" {{old('marital_state', $maritalStatus) == '3' ? 'selected="selected"' : ''}}>Divorciado</option>
        </select>
    </div>


    @php
        $sex = $client->sex;
    @endphp
    <div class="radio">
        <label><input type="radio" name="sex" value="m" {{old('sex', $sex) == 'm' ? 'checked="checked"' : ''}}>Masculino</label>
    </div>

    <div class="radio">
        <label><input type="radio" name="sex" value="f" {{old('sex', $sex) == 'f' ? 'checked="checked"' : ''}}>Feminino</label>
    </div>

    <div class="form-group">
        <label>Deficiência física</label>
        <input class="form-control" type="text" name="physical_disability" value="{{old('physical_disability', $client->physical_disability)}}">
    </div>
@else

    <div class="form-group">
        <label>Nome fantasia</label>
        <input class="form-control" type="text" name="company_name" value="{{old('company_name',$client->company_name)}}">
    </div>

@endif

<div class="checkbox">
    <label><input class="form-control" type="checkbox" name="defaulter" {{old('defaulter', $client->defaulter)  ? 'checked="checked"' : ''}}> Inadimplente </label>

</div>
