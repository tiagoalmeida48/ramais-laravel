@extends('templates.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-content">
                <h4 class="text-center">Cadastro de Ramais</h4>
                <div class="divider"></div>
                <form action="{{Route::current()->getName() == 'ramal.create' ? route('ramal.store') : route('ramal.update', $ramal->id)}}" method="post">
                    @csrf
                    @if(Route::current()->getName() == "ramal.edit") @method('PUT') @endif

                    <input type="hidden" name="usuario_id" value="{{Route::current()->getName() == 'ramal.create' ? null : $ramal->usuario_id}}">
                    <input type="hidden" name="visivel" value="S">

                    <div class="card-body">
                        <div class="row">
                            <div class="input-field col l4 s12">
                                <select name="empresa_id" id="empresa_id_select">
                                    <option value="" disabled selected>Selecione uma empresa</option>
                                    @foreach($empresas as $item)
                                        <option value="{{$item->id}}" {{ (old('empresa_id') != null && old('empresa_id') == $item->id) || ($ramal != null && $ramal['empresa_id'] == $item->id) ? "selected" : "" }}>{{$item->nome}}</option>
                                    @endforeach
                                </select>
                                <label for="empresa_id">Empresa</label>
                                @error('empresa_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="input-field col l4 s12">
                                <select name="setor_id" id="setor_id_select">
                                    <option value="" disabled selected>Selecione um setor</option>
                                        @foreach($setores as $item)
                                            <option value="{{$item->id}}" {{ (old('setor_id') != null && old('setor_id') == $item->id) || ($ramal != null && $ramal['setor_id'] == $item->id) ? "selected" : "" }}>{{$item->nome}}</option>
                                        @endforeach
                                </select>
                                <label for="setor_id">Setor</label>
                                @error('setor_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="input-field col l4 s12">
                                <input type="text" id="ramal" name="ramal" value="{{Route::current()->getName() == 'ramal.create' ? null : $ramal->ramal}}{{old('ramal')}}" class="validate">
                                <label for="ramal">Ramal</label>
                                @error('ramal')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l6 s12">
                                <input type="text" id="telefone_externo" name="telefone_externo" value="{{Route::current()->getName() == 'ramal.create' ? null : $ramal->telefone_externo}}{{old('telefone_externo')}}" class="validate">
                                <label for="telefone_externo">Telefone externo</label>
                                @error('telefone_externo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="input-field col l6 s12">
                                <input type="text" id="nome_maquina" name="nome_maquina" value="{{Route::current()->getName() == 'ramal.create' ? null : $ramal->nome_maquina}}{{old('nome_maquina')}}" class="validate">
                                <label for="nome_maquina">Nome do computador</label>
                                @error('nome_maquina')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-action text-center">
                        <button type="submit" class="waves-effect waves-light btn-small">Enviar <i class="material-icons right">send</i></button>
                        <a href="{{route('ramal.index')}}" class="waves-effect waves-light btn-small">Cancelar <i class="material-icons right">undo</i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection