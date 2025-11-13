@extends('layouts.app')

@section('title', 'Gerenciar Produtos')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Gerenciar Produtos</h2>

    <x-alert/>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0 text-dark">Lista de Produtos Cadastrados</h3>
                @if (Auth::user()->isAdmin())
                    <a href="{{ route('produtos.create') }}" class="btn btn-dark">
                        <i class="bi bi-plus-lg"></i> Cadastrar Produto
                    </a>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->preco }}</td>
                                <td class="text-center">
                                    <x-action-buttons :id="$produto->id" showRoute="produtos.show" editRoute="produtos.edit" deleteRoute="produtos.destroy"/>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Nenhum produto encontrado. Adicione um para começar!
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
