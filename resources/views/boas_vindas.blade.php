@extends('layouts.app')

@section('title', 'Bem-vindo à Loja de Roupas!')

@section('content')

<div class="container my-5">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card shadow-lg border-0 rounded-4 text-center p-5 bg-white">

            <!-- Título Principal -->
            <h1 class="display-4 fw-bold text-dark mb-3">
                Bem-vindo ao Nosso E-commerce!
            </h1>

            <!-- Subtítulo e Mensagem -->
            <p class="lead text-muted mb-4">
                Estamos muito felizes em ter você aqui. Explore nossa coleção exclusiva e encontre seu próximo look!
            </p>

            <!-- Ícone ou Linha Divisória (Opcional) -->
            <hr class="my-4 mx-auto w-25 border-primary">
            
            <!-- Chamada para Ação -->
            <a href="{{ route('produtos.index') }}" class="btn btn-primary btn-lg mt-3 shadow-sm rounded-pill">
                <i class="bi bi-shop me-2"></i> Explorar Produtos Agora
            </a>
        </div>
    </div>
</div>


</div>
@endsection