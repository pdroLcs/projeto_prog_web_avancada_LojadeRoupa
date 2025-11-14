@extends('layouts.app')

@section('title', 'Minhas Compras')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 text-primary">Histórico de Compras</h2>

    <x-alert/> 
    {{-- Assumindo que o componente x-alert/x-action-buttons existe --}}

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0 text-dark">Pedidos Realizados</h3>
                {{-- Não adicionamos botão de "Adicionar Novo" aqui, pois a compra é feita no catálogo. --}}
            </div>

            @if ($compras->isEmpty())
                <div class="alert alert-info text-center" role="alert">
                    Você ainda não possui pedidos registrados.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Pedido #</th>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Valor Total</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($compras as $compra)
                                <tr>
                                    <td>{{ $compra->id }}</td>
                                    <td>{{ $compra->created_at->format('d/m/Y H:i') }}</td>
                                    {{-- Use o relacionamento 'cliente' do Model Compra --}}
                                    <td>{{ $compra->cliente->user->name ?? 'Cliente Desconhecido' }}</td> 
                                    <td>R$ {{ number_format($compra->valor_total, 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        {{-- Para Compras, geralmente há um botão 'Ver Detalhes' --}}
                                        <a href="{{ route('compras.show', $compra->id) }}" class="btn btn-sm btn-outline-info">
                                            <i class="bi bi-eye"></i> Detalhes
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        Nenhuma compra registrada até o momento.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection