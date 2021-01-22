@extends('templates.admin')

@section('content')
    <div class="container">
        <a href="{{route('ramal.create')}}" class="waves-effect waves-light btn-small">Criar</a>

        <table class="striped highlight responsive-table centered">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Setor</th>
                    <th>Nome</th>
                    <th>Ramal</th>
                    <th>Telefone Externo</th>
                    <th>Nome Computador</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ramais as $item)
                    <tr>
                        <td>{{$item->empresas}}</td>
                        <td>{{$item->setores}}</td>
                        <td>{{$item->usuarios}}</td>
                        <td>{{$item->ramal}}</td>
                        <td>{{$item->telefone_externo}}</td>
                        <td>{{$item->nome_maquina}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <a href="{{route('ramal.edit', $item->id)}}" class="btn btn-sm btn-outline-info">Editar</a>
                            <a href="#modal{{$item->id}}" class="waves-effect waves-light btn modal-trigger">Excluir</a>

                            <div id="modal{{$item->id}}" class="modal">
                                <div class="modal-content">
                                    <h4>Informação!</h4>
                                    <div class="divider"></div>
                                    <h5>Deseja inativar o ramal: {{$item->ramal}}?</h5>
                                </div>
                                <div class="divider"></div>
                                    <form action="{{route('ramal.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-close waves-effect waves-light btn-small">Cancelar <i class="material-icons right">undo</i></a>
                                            <button type="submit" class="waves-effect waves-light btn-small red">Inativar <i class="material-icons right">delete</i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum registro cadastrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
