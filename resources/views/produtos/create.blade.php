@extends('layouts.app')

@section('title', 'Cadastar Produto')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">Cadastrar Novo Produto</h2>
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-form.input label="Nome do produto" name="nome" placeholder="Camisa Polo"/>
                    <x-form.input label="Preço" name="preco" type="number" placeholder="99,99" step="0.01" />
                    <x-form.input label="Descrição" name="descricao" type="textarea" placeholder="Digite uma breve descrição do produto"/>
                    <x-form.input label="Material" name="material" placeholder="Tecido, Couro"/>
                    <x-form.input label="Marca" name="marca"/>
                    <x-form.select label="Categoria" name="categoria_id" :options="$categorias->pluck('nome', 'id')"/>
                    <x-form.input label="Imagem" name="imagem" type="file" accept="image/*"/>

                    <x-form.actions :back="route('produtos.index')"/>
                </form>
            </div>
        </div>
    </div>
@endsection