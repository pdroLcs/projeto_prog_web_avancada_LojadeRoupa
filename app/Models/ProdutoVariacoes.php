<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProdutoVariacoes extends Model
{
    protected $fillable = [
        'produto_id', 
        'tamanho', 
        'cor', 
        'quantidade_estoque', 
        'preco_adicional',
    ];

    public function produto(): BelongsTo
    {
        // 'produto_id' é a chave estrangeira na tabela 'produto_variacoes' que aponta para a tabela 'produtos'.
        return $this->belongsTo(Produto::class, 'produto_id');
    }   

    public function itensCompra(): HasMany
    {
        return $this->hasMany(ItensCompra::class, 'produto_variacao_id');
    }
}
