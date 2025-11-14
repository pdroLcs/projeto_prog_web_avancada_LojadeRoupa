<div class="d-inline-flex gap-1">
    {{-- Botão Ver --}}
    @isset($showRoute)
        <a href="{{ route($showRoute, $id) }}" class="btn btn-sm btn-outline-primary">
            <i class="bi bi-eye"></i> Ver
        </a>
    @endisset

    @if (Auth::check() && !Auth::user()->isAdmin())
        {{-- Botão Comprar --}}
        @isset($buyRoute)
            <a href="{{ route($buyRoute, $id) }}" class="btn btn-sm btn-outline-warning">
                <i class="bi bi-cart"></i> Comprar
            </a>
        @endisset
    @endif

    @if ($onlyAdmin == "true")
        @if (Auth::check() && Auth::user()->isAdmin())
            {{-- Botão Editar --}}
            @isset($editRoute)
                <a href="{{ route($editRoute, $id) }}" class="btn btn-sm btn-outline-success">
                    <i class="bi bi-pencil"></i> Editar
                </a>
            @endisset

            {{-- Botão Excluir --}}
            @isset($deleteRoute)
                <form action="{{ route($deleteRoute, $id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger"
                        onclick="return confirm('Tem certeza que deseja excluir este item?')">
                        <i class="bi bi-trash"></i> Excluir
                    </button>
                </form>
            @endisset
        @endif
    @else
        @isset($editRoute)
            <a href="{{ route($editRoute, $id) }}" class="btn btn-sm btn-outline-success">
                <i class="bi bi-pencil"></i> Editar
            </a>
        @endisset

        {{-- Botão Excluir --}}
        @isset($deleteRoute)
            <form action="{{ route($deleteRoute, $id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger"
                    onclick="return confirm('Tem certeza que deseja excluir este item?')">
                    <i class="bi bi-trash"></i> Excluir
                </button>
            </form>
        @endisset            
    @endif
</div>
