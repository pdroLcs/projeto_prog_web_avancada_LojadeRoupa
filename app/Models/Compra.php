<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; 

use App\Models\User; 

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id', // JÁ CORRIGIDO
        'valor_total',
        'status',
    ];

    // Informa ao Laravel para converter data_compra para um objeto datetime
    protected $casts = [
        'data_compra' => 'datetime',
    ];


    public function cliente(): BelongsTo // Mantemos o nome 'cliente' para não quebrar a View
    {
        // O relacionamento deve ser com o Model User, usando a chave 'user_id'
        return $this->belongsTo(Cliente::class); 
    }

    public function itens(): HasMany
    {
        return $this->hasMany(ItensCompra::class);
    }
}