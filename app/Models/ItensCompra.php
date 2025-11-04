<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItensCompra extends Model
{
    protected $fillable = ['pedido_id','produto_id', 'quantidade', 'preco_unitario'];

    public function compra(): BelongsTo
    {
        // 'pedido_id' é a chave estrangeira na tabela 'itens_compra' que aponta para a tabela 'compras'.
        return $this->belongsTo(Compra::class, 'pedido_id');
    }

    public function produto(): BelongsTo
    {
        // 'produto_id' é a chave estrangeira na tabela 'itens_compra' que aponta para a tabela 'produtos'.
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
