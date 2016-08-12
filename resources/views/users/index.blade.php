@extends('layouts.app')

@section('page-title')
 - Usuários
@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h3>Gerenciamento de Usuários</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('users.new') }}" class="btn btn-primary btn-xs">Novo</a>
        </div>
    </div>

    @include('partials.alerts')
    @include('partials.userCount')

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>E-mail</th>
                <th width="1%" nowrap>Vendas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ count($user->sales) }}</td>
                <td width="1%" nowrap="nowrap">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-default btn-xs">Editar</a>
                    <a href="{{ route('users.delete', $user->id) }}" class="btn btn-default btn-xs btn-remover">Excluir</a>
                </td>
            </tr>
            @endforeach()
        </tbody>
    </table>
    <div class="text-center">
        {{ $users->render() }}
    </div>
@stop

@section('scripts')
    <script src="/js/users.js"></script>
@stop

