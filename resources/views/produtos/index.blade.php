@extends('layouts.app')

@section('title', 'Catálogo de Produtos')
{{-- Alterei o título para "Catálogo de Produtos" para refletir a interface do cliente --}}

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 text-primary">Catálogo de Produtos e Serviços</h2>

    <x-alert/>
    
    {{-- Ações no Topo (Visíveis apenas para Admin) --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-dark">Produtos Cadastrados</h3>
        
        {{-- Botão Cadastrar Produto (Visível APENAS para Admin) --}}
        @if (Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('produtos.create') }}" class="btn btn-dark">
                <i class="bi bi-plus-lg"></i> Cadastrar Produto
            </a>
        @endif
    </div>

    @if ($produtos->isEmpty())
        <div class="alert alert-info text-center py-5" role="alert">
            Nenhum produto encontrado no catálogo.
        </div>
    @else
        <div class="row g-4">
            {{-- Loop para exibir os produtos em formato de Card --}}
            @foreach ($produtos as $produto)
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow-sm border-0 rounded-3">
                        <div class="card-body d-flex flex-column">
                            
                            {{-- Nome do Produto --}}
                            <h5 class="card-title text-dark fw-bold mb-2">{{ $produto->nome }}</h5>
                            
                            {{-- Imagem do Produto --}}
                            @if ($produto->imagem)
                                {{-- Assume que php artisan storage:link foi executado --}}
                                <img src="{{ asset('storage/' . $produto->imagem) }}" 
                                    class="card-img-top" 
                                    alt="{{ $produto->nome }}"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light text-center d-flex align-items-center justify-content-center"
                                    style="height: 200px;">
                                    <span class="text-muted">Sem imagem</span>
                                </div>
                            @endif
                            
                            {{-- Descrição e Preço --}}
                            <p class="text-muted small my-2">
                                {{ Str::limit($produto->descricao, 80, '...') }}
                            </p>
                            <h6 class="fw-semibold mb-4 text-success">R$ {{ number_format($produto->preco, 2, ',', '.') }}</h6>
                            
                            
                            <div class="mt-auto text-center">
                                @auth
                                    @if (Auth::user()->role === 'cliente')
                                        {{-- AÇÕES DO CLIENTE (Ver Detalhes e Comprar) --}}
                                        <div class="d-flex justify-content-between gap-2">
                                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-outline-secondary w-50">
                                                <i class="bi bi-eye"></i> Ver Detalhes
                                            </a>
                                            <a href="{{ route('compra.agora', $produto->id) }}" class="btn btn-success w-50">
                                                <i class="bi bi-bag-fill"></i> Comprar
                                            </a>
                                        </div>
                                        
                                    @elseif (Auth::user()->role === 'admin')
                                        {{-- AÇÕES DO ADMIN (Gerenciar/CRUD) --}}
                                        <div class="d-inline-flex gap-1">
                                            <x-button route="produtos.show" :id="$produto->id" icon="bi bi-eye" text="Ver" color="primary" />
                                            <x-button route="produtos.edit" :id="$produto->id" icon="bi bi-pencil" text="Editar" color="success" />
                                            <x-button route="produtos.destroy" :id="$produto->id" method="DELETE" icon="bi bi-trash" text="Excluir" color="danger" />
                                        </div>

                                    @endif
                                @else 
                                    {{-- Usuário não logado --}}
                                    <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100">Faça login para comprar</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection