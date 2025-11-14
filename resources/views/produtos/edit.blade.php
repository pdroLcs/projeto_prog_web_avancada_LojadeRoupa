@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="mb-4">Editar Produto</h2>

            <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input label="Nome do Produto" name="nome" type="text" :value="$produto->nome"/>
                <x-form.input label="Preço" name="preco" type="number" step="0.01" :value="$produto->preco"/>
                <x-form.input label="Descrição" name="descricao" type="textarea" :value="$produto->descricao"/>
                <x-form.input label="Material" name="material" :value="$produto->material"/>
                <x-form.input label="Marca" name="marca" :value="$produto->marca"/>
                <x-form.select label="Categoria" name="categoria_id" :options="$categorias->pluck('nome', 'id')" :value="$produto->categoria_id"/>

                @if ($produto->imagem)
                    <div class="mb-3">
                        <label class="form-label">Imagem Atual:</label><br>
                        <img src="{{ asset('storage/' . $produto->imagem) }}" 
                             alt="Imagem do produto" 
                             class="img-thumbnail" width="150">
                    </div>
                @endif
                <x-form.input label="Trocar imagem" name="imagem" type="file" accept="image/*"/>

                <x-form.actions :back="route('produtos.index')"/>
            </form>
        </div>
    </div>

</div>
@endsection
