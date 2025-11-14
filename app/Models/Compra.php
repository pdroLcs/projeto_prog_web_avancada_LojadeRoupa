<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// ADICIONE O MODEL USER AQUI
use App\Models\User; 

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // JÁ CORRIGIDO
        'valor_total',
        'data_compra',
        'status',
    ];

    // CORREÇÃO CRÍTICA DO RELACIONAMENTO:
    public function cliente(): BelongsTo // Mantemos o nome 'cliente' para não quebrar a View
    {
        // O relacionamento deve ser com o Model User, usando a chave 'user_id'
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function itens(): HasMany
    {
        return $this->hasMany(ItensCompra::class);
    }
}