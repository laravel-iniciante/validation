
{{csrf_field()}}

<div class="form-group">
    <label>Nome</label>
    <input class="form-control" type="text" name="name" value="{{$client->name}}">
</div>

<div class="form-group">
    <label>Documet number</label>
    <input class="form-control" type="text" name="document_number" value="{{$client->document_number}}">
</div>

<div class="form-group">
    <label>Email</label>
    <input class="form-control" type="email" name="email" value="{{$client->email}}">
</div>

<div class="form-group">
    <label>Telefone</label>
    <input class="form-control" type="text" name="phone" value="{{$client->phone}}">
</div>

<div class="form-group">

    <label>Estado civil</label>
    <select class="form-control" name="marital_state">
        <option value="">Selecione o estado civil </option>
        <option value="1" {{$client->marital_status == '1' ? 'selected="selected"' : ''}}>Solteiro</option>
        <option value="2" {{$client->marital_status == '2' ? 'selected="selected"' : ''}}>Casado</option>
        <option value="3" {{$client->marital_status == '3' ? 'selected="selected"' : ''}}>Divorciado</option>
    </select>
</div>

<div class="form-group">
    <label>Data de nascimento</label>
    <input class="form-control" type="date" name="date_birth" value="{{$client->date_birth}}">
</div>

<div class="radio">
    <label><input type="radio" name="sex" value="m" {{$client->sex == 'm' ? 'checked="checked"' : ''}}>Masculino</label>
</div>

<div class="radio">
    <label><input type="radio" name="sex" value="f" {{$client->sex == 'f' ? 'checked="checked"' : ''}}>Feminino</label>
</div>

<div class="form-group">
    <label>Deficiência física</label>
    <input class="form-control" type="text" name="physical_disability" value="{{$client->physical_disability}}">
</div>

<div class="checkbox">
    <label><input class="form-control" type="checkbox" name="defaulter" {{$client->defaulter ? 'checked="checked"' : ''}}> Inadinplente</label>

</div>