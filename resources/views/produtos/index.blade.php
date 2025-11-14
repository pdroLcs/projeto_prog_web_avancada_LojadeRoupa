@extends('layouts.app')

@section('title', 'Gerenciar Produtos')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Gerenciar Produtos</h2>

    <x-alert/>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-dark">Produtos Cadastrados</h3>
        @if (Auth::user()->isAdmin())
            <a href="{{ route('produtos.create') }}" class="btn btn-dark">
                <i class="bi bi-plus-lg"></i> Cadastrar Produto
            </a>
        @endif
    </div>

    @if ($produtos->isEmpty())
        <div class="text-center text-muted py-5">
            Nenhum produto encontrado. Adicione um para começar!
        </div>
    @else
        <div class="row g-4">
            @foreach ($produtos as $produto)
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow-sm border-0 rounded-3">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-dark fw-bold mb-2">{{ $produto->nome }}</h5>
                            @if ($produto->img)
                                <img src="{{ asset('storage/' . $produto->img) }}" 
                                    class="card-img-top" 
                                    alt="{{ $produto->nome }}"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light text-center d-flex align-items-center justify-content-center"
                                    style="height: 200px;">
                                    <span class="text-muted">Sem imagem</span>
                                </div>
                            @endif
                            <p class="text-muted small mb-2">
                                {{ Str::limit($produto->descricao, 80, '...') }}
                            </p>
                            <h6 class="fw-semibold mb-4">R${{ number_format($produto->preco, 2, ',', '.') }}</h6>
                            
                            <div class="mt-auto text-center">
                                <x-action-buttons 
                                    :id="$produto->id" 
                                    showRoute="produtos.show" 
                                    editRoute="produtos.edit" 
                                    deleteRoute="produtos.destroy"/>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
