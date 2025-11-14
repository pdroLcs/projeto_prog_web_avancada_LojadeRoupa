@extends('layouts.app')

@section('title', 'Detalhes do Cliente')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Detalhes do Cliente</h2>

    <x-show.card title="{{ $cliente->user->name }}">
        <div class="row mb-3">
            <div class="col-md-6">
                <x-show.field label="Email" :value="$cliente->user->email" />
                <x-show.field label="Telefone" :value="$cliente->telefone" />
            </div>
        </div>
{{-- 
        @if(isset($cliente->clienteVariacoes) && $cliente->clienteVariacoes->count() > 0)
            <hr>
            <h5 class="mt-4 mb-3">Variações disponíveis</h5>
            <ul class="list-group mb-3">
                @foreach ($cliente->clienteVariacoes as $variacao)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Tamanho: {{ $variacao->tamanho }} | Cor: {{ $variacao->cor }}</span>
                    </li>
                @endforeach
            </ul>
        @endif --}}

        <x-show.actions :back="route('clientes.index')" />
    </x-show.card>
</div>
@endsection
