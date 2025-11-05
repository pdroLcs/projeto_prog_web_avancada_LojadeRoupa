<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciar Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-6">

                        {{-- Tabela de Produtos (Requisito Estrutural: Lista de Produtos/Serviços) --}}
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Lista de Produtos Existentes</h3>

                        {{-- Botão Adicionar Produto (Requisito Estrutural) --}}
                        <div class="p-4 mb-4">
                            <a href="{{ route('produtos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded border-2 border-blue-700 hover:border-blue-900">
                                Adicionar Novo Produto
                            </a>
                        </div>

                    </div>
                    
                    @if ($produtos->isEmpty())
                        <p>Nenhum produto encontrado. Adicione um para começar!</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($produtos as $produto)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $produto->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $produto->nome }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>