<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
    * Run the migrations.
    */
    public function up(): void
    {
        Schema::create('itens_compras', function (Blueprint $table) {
            $table->id();
            
            // CHAVES ESTRANGEIRAS ESSENCIAIS
            $table->foreignId('compra_id')->constrained()->onDelete('cascade'); // A qual compra pertence
            $table->foreignId('produto_id')->constrained()->onDelete('cascade'); // Qual produto foi comprado
            
            // CAMPOS DE DADOS
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 10, 2);

            $table->timestamps();
        });
    }

    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('itens_compras');
    }
};                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          