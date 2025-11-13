@extends('layouts.app')

@section('title', 'Gerenciar Clientes')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Gerenciar Clientes</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <h3 class="mb-4 text-dark">Lista de Clientes Cadastrados</h3>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->user->name }}</td>
                                <td>{{ $cliente->user->email }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td class="text-center">
                                    <x-action-buttons :id="$cliente->id" showRoute="clientes.show" editRoute="clientes.edit" deleteRoute="clientes.destroy"/>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Nenhum cliente encontrado. Adicione um para começar!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
