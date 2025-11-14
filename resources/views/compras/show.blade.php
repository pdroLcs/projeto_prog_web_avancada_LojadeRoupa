@extends('layouts.app')

@section('title', 'Detalhes da Compra #' . $compra->id)

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-primary">Detalhes do Pedido #{{ $compra->id }}</h2>

    <div class="row">
        {{-- COLUNA ESQUERDA: Detalhes do Pedido e Cliente --}}
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-header bg-primary text-white fw-bold">Informações do Pedido</div>
                <div class="card-body">
                    <p><strong>Status:</strong> <span class="badge bg-success">{{ $compra->status ?? 'Concluído' }}</span></p>
                    <p><strong>Data da Compra:</strong> {{ $compra->data_compra->format('d/m/Y H:i') }}</p>
                    <p><strong>Cliente:</strong> {{ $compra->cliente->name ?? 'N/A' }}</p>
                    <p><strong>Valor Total:</strong> <h4 class="text-success">R$ {{ number_format($compra->valor_total, 2, ',', '.') }}</h4></p>
                    
                    <a href="{{ route('compras.index') }}" class="btn btn-sm btn-outline-secondary mt-3">
                        &larr; Voltar ao Histórico
                    </a>
                </div>
            </div>
        </div>

        {{-- COLUNA DIREITA: Itens Comprados --}}
        <div class="col-md-7 mb-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-dark text-white fw-bold">Itens do Pedido ({{ $compra->itens->count() }} itens)</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th class="text-center">Qtd</th>
                                    <th class="text-end">Preço Unit.</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compra->itens as $item)
                                <tr>
                                    <td>{{ $item->produto->nome ?? 'Produto Removido' }}</td>
                                    <td class="text-center">{{ $item->quantidade }}</td>
                                    <td class="text-end">R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                                    <td class="text-end fw-bold">R$ {{ number_format($item->quantidade * $item->preco_unitario, 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection