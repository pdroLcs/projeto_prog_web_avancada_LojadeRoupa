@extends('layouts.app')

@section('title', 'Criar Categoria')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Criar Nova Categoria</h4>
        </div>

        <div class="card-body">
            {{-- Exibir mensagens de erro --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulário de criação --}}
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nome" class="form-label fw-bold">Nome da Categoria</label>
                    <input type="text" 
                           name="nome" 
                           id="nome" 
                           class="form-control @error('nome') is-invalid @enderror"
                           placeholder="Ex: Roupas, Calçados..." 
                           value="{{ old('nome') }}" required>

                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('categorias.index') }}" class="btn btn-secondary me-2">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
