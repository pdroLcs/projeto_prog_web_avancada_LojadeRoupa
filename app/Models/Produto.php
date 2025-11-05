<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produto extends Model
{
    protected $fillable = ['nome', 'preco', 'descricao', 'material', 'marca', 'categoria_id'];

    public function categoria(): BelongsTo
    {
        // O Laravel assume que a chave estrangeira é 'categoria_id', mas é bom ser explícito.
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function itensCompra(): HasMany
    {
        // Liga este produto aos registros na tabela 'itens_compra'
        return $this->hasMany(ItensCompra::class, 'produto_id');
    }

   public function ProdutoVariacoes(): HasMany
    {
        return $this->hasMany(ProdutoVariacoes::class);
    }
}
