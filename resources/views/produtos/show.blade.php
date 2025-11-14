@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Detalhes do Produto</h2>

    <x-show.card title="{{ $produto->nome }}">
        <div class="row mb-3">
            <div class="col-md-6">
                <x-show.field label="Preço" :value="'R$ ' . number_format($produto->preco, 2, ',', '.')" />
                <x-show.field label="Categoria" :value="$produto->categoria->nome" />
                <x-show.field label="Material" :value="$produto->material" />
                <x-show.field label="Marca" :value="$produto->marca" />
                @if ($produto->imagem)
                    <img src="{{ asset('storage/' . $produto->imagem) }}" 
                        alt="Imagem do produto" 
                        width="200" class="rounded shadow-sm">
                @else
                    <p class="text-muted">Sem imagem</p>
                @endif
            </div>

            <div class="col-md-6">
                <x-show.field label="Descrição" :value="$produto->descricao" />
            </div>
        </div>
{{-- 
        @if(isset($produto->ProdutoVariacoes) && $produto->ProdutoVariacoes->count() > 0)
            <hr>
            <h5 class="mt-4 mb-3">Variações disponíveis</h5>
            <ul class="list-group mb-3">
                @foreach ($produto->ProdutoVariacoes as $variacao)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Tamanho: {{ $variacao->tamanho }} | Cor: {{ $variacao->cor }}</span>
                    </li>
                @endforeach
            </ul>
        @endif --}}

        <x-show.actions :back="route('produtos.index')" />
    </x-show.card>
</div>
@endsection
