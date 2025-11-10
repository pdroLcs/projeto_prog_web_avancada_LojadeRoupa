<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProdutoVariacoes extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'tamanho', 'cor', 'quantidade_estoque', 'preco_adicional'];

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }   

    public function itensCompra(): HasMany
    {
        return $this->hasMany(ItensCompra::class);
    }
}
