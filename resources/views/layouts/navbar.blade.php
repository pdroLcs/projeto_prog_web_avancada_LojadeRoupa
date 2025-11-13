<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Loja de Roupa</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- collapse com os links à esquerda --}}
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <x-nav-button-link href="{{ url('/') }}" :active="Request()->routeIs('/')">Início</x-nav-button-link>
        <x-nav-button-link href="{{ url('/produtos') }}" :active="Request()->routeIs('produtos.*')">Produtos</x-nav-button-link>
        <x-nav-button-link href="{{ url('/compras') }}" :active="Request()->routeIs('compras.*')">Compras</x-nav-button-link>
        @if (Auth::user()->isAdmin())
          <x-nav-button-link href="{{ url('/clientes') }}" :active="Request()->routeIs('clientes.*')">Clientes</x-nav-button-link>
          <x-nav-button-link href="{{ url('/categorias') }}" :active="Request()->routeIs('categorias.*')">Categorias</x-nav-button-link>
        @endif
      </ul>
    </div>

    {{-- perfil fora do collapse — fica sempre visível e dropdown não é recortado --}}
    <ul class="navbar-nav ms-auto">
      @auth
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
             data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="me-2">{{ Auth::user()->name }}</span>
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">Editar Perfil</a>

            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="dropdown-item">Sair</button>
            </form>
          </div>
        </li>
      @else
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
      @endauth
    </ul>

  </div>
</nav>
