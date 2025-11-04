<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['valor_total', 'status'];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'user_id');
    }

    public function itens(): HasMany
    {
        return $this->hasMany(ItensCompra::class, 'pedido_id');
    }
}
