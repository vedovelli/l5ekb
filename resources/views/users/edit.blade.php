@extends('layouts.app')

@section('content')
    <h1>Editar usuário {{ $user->name }}</h1>

    @include('partials.alerts')

    {{ Form::model($user, ['route' => ['users.update', $user->id]]) }}
        @include('users.partials.form')
        <button class="btn btn-success" type="submit">Atualizar</button>
        <a href="{{ route('users.index') }}" class="btn btn-default btn-xs">Voltar</a>
    {{ Form::close() }}
@stop