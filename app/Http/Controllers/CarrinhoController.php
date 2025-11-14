<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\ItensCompra;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{

    // Ação principal: Comprar um produto imediatamente
    public function comprarAgora(Produto $produto)
    {
        // 1. Verificação de Regra de Negócio (Opcional, mas seguro)
        if (Auth::user()->role !== 'user') {
            return redirect()->route('produtos.index')->with('error', 'Apenas clientes podem fazer compras.');
        }

        // 2. Criar registro da Compra (no BD)
        $compra = Compra::create([
            'user_id' => Auth::id(), // <-- CORRIGIDO: Usa o ID do usuário logado
            'valor_total' => $produto->preco, 
            'data_compra' => now(), 
            'status' => 'Processando', 
        ]);

        // 3. Criar o Item da Compra (na tabela pivot)
        ItensCompra::create([
            'compra_id' => $compra->id, // Usa o ID da Compra que acabamos de criar
            'produto_id' => $produto->id,
            'quantidade' => 1,
            'preco_unitario' => $produto->preco,
        ]);

        // 4. Redirecionar para o histórico do cliente
        return redirect()->route('compras.index')->with('success', 'Compra realizada com sucesso!');
    }
}