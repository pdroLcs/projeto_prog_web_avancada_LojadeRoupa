@props([
    'route' => null,     // Nome da rota (opcional)
    'id' => null,        // ID do recurso (opcional)
    'method' => 'GET',   // GET, POST, PUT, DELETE
    'color' => 'primary',
    'icon' => null,
    'text' => '',
    'type' => null,      // submit / button (para uso em forms)
])

{{-- Caso seja DELETE/PUT/POST com rota definida --}}
@if ($route && in_array($method, ['DELETE', 'POST', 'PUT']))
    <form action="{{ route($route, $id) }}" method="POST" class="d-inline">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif

        <button type="submit" class="btn btn-sm btn-outline-{{ $color }}"
            @if($method === 'DELETE') onclick="return confirm('Tem certeza que deseja excluir?')" @endif>
            @if ($icon) <i class="{{ $icon }}"></i> @endif
            {{ $text }}
        </button>
    </form>

{{-- Caso seja GET com rota --}}
@elseif($route)
    <a href="{{ route($route, $id) }}" class="btn btn-sm btn-outline-{{ $color }}">
        @if ($icon) <i class="{{ $icon }}"></i> @endif
        {{ $text }}
    </a>

{{-- Caso seja um botão normal dentro de formulário --}}
@else
    <button type="{{ $type ?? 'submit' }}" class="btn btn-sm btn-outline-{{ $color }}">
        @if ($icon) <i class="{{ $icon }}"></i> @endif
        {{ $text }}
    </button>
@endif
