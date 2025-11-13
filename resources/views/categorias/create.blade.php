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
                <x-form.input label="Nome da Categoria" name="nome" placeholder="Roupas, Calçados" required/>

                <x-form.actions :back="route('categorias.index')"/>
            </form>
        </div>
    </div>
</div>
@endsection
