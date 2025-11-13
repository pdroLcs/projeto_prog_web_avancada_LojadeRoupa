@extends('layouts.app')

@section('title', 'Gerenciar Categorias')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Gerenciar Categorias</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0 text-dark">Lista de Categorias Cadastradas</h3>
                <a href="{{ route('categorias.create') }}" class="btn btn-dark">
                    <i class="bi bi-plus-lg"></i> Cadastrar Categoria
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nome }}</td>
                                <td class="text-center">
                                    <x-action-buttons :id="$categoria->id" showRoute="categorias.show" editRoute="categorias.edit" deleteRoute="categorias.destroy"/>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Nenhuma categoria encontrada. Adicione uma para começar!
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
