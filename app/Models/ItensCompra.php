<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItensCompra extends Model
{
    use HasFactory;

    protected $fillable = ['compra_id','produto_id', 'quantidade', 'preco_unitario'];

    public function compra(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}
