<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciar Compras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Esta View geralmente não tem 'adicionar', mas sim 'visualizar' --}}
                    
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Lista de Compras Realizadas</h3>
                    
                    @if ($compras->isEmpty())
                        <p>Nenhuma compra registrada até o momento.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Compra</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor Total</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($compras as $compra)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $compra->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $compra->cliente->nome ?? 'Cliente Removido' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $compra->created_at->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">R$ {{ number_format($compra->valor_total, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('compras.show', $compra->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Ver Detalhes</a>
                                    </td>
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