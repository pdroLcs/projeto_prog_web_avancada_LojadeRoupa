@extends('layouts.app')

@section('title', 'Mensagens dos Clientes')

@section('header')
    <h2 class="h4 mb-0">
        {{ __('Mensagens dos Clientes') }}
    </h2>
@endsection

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card shadow-lg border-0">
            <div class="card-header bg-warning text-dark fw-bold">
                Caixa de Entrada ({{ $mensagens->count() }} Mensagens)
            </div>

            <div class="card-body p-0">

                @forelse ($mensagens as $mensagem)
                    <div class="list-group-item list-group-item-action p-4">

                        {{-- Cabeçalho --}}
                        <div class="d-flex justify-content-between align-items-center">

                            {{-- Nome do Cliente --}}
                            <h5 class="mb-0 fw-bold">
                                {{ $mensagem->cliente->nome }}
                            </h5>

                            {{-- Data + Botão Excluir --}}
                            <div class="d-flex align-items-center">

                                <small class="text-muted me-3">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $mensagem->created_at->diffForHumans() }}
                                </small>

                                <form action="{{ route('fale-conosco.destroy', $mensagem->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Deseja excluir esta mensagem?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" title="Excluir">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Dados do cliente --}}
                        <p class="text-muted mt-2 mb-1">
                            <i class="bi bi-envelope me-1"></i> {{ $mensagem->cliente->user->email }}
                            <span class="mx-2">|</span>
                            <i class="bi bi-phone me-1"></i> {{ $mensagem->cliente->telefone }}
                        </p>

                        <hr>

                        {{-- Assunto --}}
                        <p class="fw-bold mb-1">
                            Assunto: {{ $mensagem->assunto }}
                        </p>

                        {{-- Corpo da Mensagem --}}
                        <p class="text-break mb-0">
                            {{ $mensagem->mensagem }}
                        </p>

                    </div>

                @empty
                    <div class="py-5 text-center">
                        <i class="bi bi-inbox display-4 text-muted"></i>
                        <p class="lead mt-3 text-muted">Nenhuma mensagem recebida.</p>
                    </div>
                @endforelse

            </div>

        </div>

    </div>
</div>
@endsection
