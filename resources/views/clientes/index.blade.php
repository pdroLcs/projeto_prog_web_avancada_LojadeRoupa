@extends('layouts.app')

@section('title', 'Gerenciar Clientes')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Gerenciar Clientes</h2>

    {{-- Verificação para ver se há clientes cadastrados --}}
    @if ($clientes->isEmpty())
        <div class="alert alert-warning text-center">
            Nenhum cliente encontrado. Adicione um para começar!
        </div>
    @else
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                <h3 class="mb-4 text-dark">Lista de Clientes Cadastrados</h3>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id }}</td>
                                    <td>{{ $cliente->user->name }}</td>
                                    <td>{{ $cliente->user->email }}</td>
                                    <td>{{ $cliente->telefone }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
