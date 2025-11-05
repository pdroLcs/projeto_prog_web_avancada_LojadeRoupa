<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciamento de Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-between items-center mb-6">
                        
                        {{-- Tabela de Categorias Cadastradas --}}
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Lista de Categorias Cadastradas</h3>

                        {{-- Botão Adicionar Categoria --}}
                        <div class="p-4 mb-4">
                            <a href="{{ route('categorias.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                                Adicionar Nova Categoria
                            </a>
                        </div>
                    </div>
                    
                    <!-- Verificação para ver se já tem alguma categoria cadastrada -->
                    @if ($categorias->isEmpty())
                        <p>Nenhum Categoria Cadastrada. Adicione um para começar!</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->nome }}</td>
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
