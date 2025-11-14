@extends('layouts.app')

{{-- Define o cabeçalho --}}
@section('header')
    <h2 class="h4 mb-0">
        {{ __('Visualização de Mensagens dos Clientes') }}
    </h2>
@endsection

{{-- Conteúdo principal da página --}}
@section('content')
    <div class="row">
        <div class="col-12">
            
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-dark">
                    {{-- CORREÇÃO: Usa isset() para garantir que count() só seja chamado se $mensagens existir --}}
                    <h5 class="mb-0">Caixa de Entrada ({{ isset($mensagens) ? count($mensagens) : 0 }} Mensagens)</h5>
                </div>
                <div class="card-body p-0">
                    
                    {{-- 
                        Requisito: Listar mensagens da mais recente para a mais antiga.
                        O Controller é quem deve garantir a ordenação decrescente de data.
                    --}}
                    @forelse ($mensagens as $mensagem)
                        <div class="list-group-item list-group-item-action @if(!$mensagem->lida) list-group-item-light @endif p-4">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                
                                {{-- Status/Nome do Cliente --}}
                                <div>
                                    <span class="badge rounded-pill me-2 @if(!$mensagem->lida) bg-success @else bg-secondary @endif">
                                        {{ $mensagem->lida ? 'Lida' : 'Nova' }}
                                    </span>
                                    <h5 class="mb-1 d-inline-block">{{ $mensagem->nome }}</h5>
                                </div>
                                
                                {{-- Data e Ação --}}
                                <small class="text-muted">
                                    {{-- Assumindo que o Model tem um campo 'created_at' --}}
                                    <i class="bi bi-clock me-1"></i> {{ $mensagem->created_at->diffForHumans() }}
                                    
                                    <button class="btn btn-sm btn-outline-danger ms-3" title="Excluir Mensagem">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </small>
                            </div>

                            <p class="mb-1 mt-2 text-muted">
                                <i class="bi bi-envelope me-1"></i> **Email:** {{ $mensagem->email }} | 
                                <i class="bi bi-phone me-1"></i> **Telefone:** {{ $mensagem->telefone }}
                            </p>
                            
                            {{-- Motivo do Contato (Requisito do Formulário) --}}
                            <p class="mt-2 mb-0">
                                **Motivo:** <span class="fw-bold">{{ $mensagem->motivo ?? 'N/A' }}</span>
                            </p>
                            
                            <hr class="my-2">
                            
                            <p class="mb-0 text-break">{{ $mensagem->mensagem }}</p>
                        </div>
                    @empty
                        <div class="p-5 text-center">
                            <i class="bi bi-inbox-fill display-4 text-muted"></i>
                            <p class="lead mt-3 text-muted">Nenhuma mensagem de cliente recebida ainda.</p>
                        </div>
                    @endforelse
                </div>
                
                {{-- Exemplo de Paginação --}}
                {{-- <div class="card-footer">
                    {{ $mensagens->links() }}
                </div> --}}
            </div>
            
        </div>
    </div>
@endsection