@extends('layouts.app')

@section('title', 'Criar Mensagem')

@section('content')
<div class="container mt-4">
    <x-alert/>
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Criar Mensagem</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('fale-conosco.store') }}" method="POST">
                @csrf

                <!-- Assunto -->
                <div class="mb-3">
                    <x-form.input 
                        name="assunto" 
                        label="Assunto" 
                        value="{{ old('assunto') }}" />
                </div>

                <!-- Mensagem -->
                <div class="mb-3">
                    <x-form.input 
                        name="mensagem" 
                        label="Mensagem" 
                        type="textarea" 
                        value="{{ old('mensagem') }}" />
                </div>

                {{-- <!-- Cliente -->
                <div class="mb-3">
                    <x-form.input 
                        name="cliente_id" 
                        label="Cliente" 
                        type="number" 
                        class="form-control" 
                        value="{{ old('cliente_id') }}" />
                </div> --}}

                <x-form.actions/>
                {{-- <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('mensagens.index') }}" class="btn btn-secondary">Voltar</a> --}}
            </form>
        </div>
    </div>
</div>
@endsection
