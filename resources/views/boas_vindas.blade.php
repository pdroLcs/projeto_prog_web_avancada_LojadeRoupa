@extends('layouts.app')

@section('title', 'Bem-vindo à Loja de Roupas!')

@section('content')
<style>
    .welcome-background {
        background-image: url('{{ asset('/images/fachadaloja.jpg') }}');
        background-size: cover;       
        background-position: center;  
        min-height: 100vh;    
        display: flex;                
        align-items: center;          
        justify-content: center;      
        position: relative;           
    }

    .welcome-background::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3); 
        z-index: 1; 
    }

    .card {
        z-index: 2; 
    }
</style>

<div class="welcome-background">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 text-center p-5 bg-white">

                    <h1 class="display-4 fw-bold text-dark mb-3">
                        Bem-vindo à Pano de Fundo!
                    </h1>

                    <p class="lead text-muted mb-4">
                        Estamos muito felizes em ter você aqui. Explore nossa coleção exclusiva e encontre seu próximo look!
                    </p>

                    <hr class="my-4 mx-auto w-25 border-primary">

                    <a href="{{ route('produtos.index') }}" class="btn btn-primary btn-lg mt-3 shadow-sm rounded-pill">
                        <i class="bi bi-shop me-2"></i> Explorar Produtos Agora
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection