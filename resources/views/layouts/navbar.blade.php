<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Pano de Fundo</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- collapse com os links à esquerda --}}
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <x-nav-button-link href="{{ url('/produtos') }}" :active="Request()->routeIs('produtos.*')">Produtos</x-nav-button-link>
        <x-nav-button-link href="{{ url('/compras') }}" :active="Request()->routeIs('compras.*')">Compras</x-nav-button-link>
        <x-nav-button-link href="{{ url('/sobre-nos') }}" :active="Request()->routeIs('sobre-nos.*')">Sobre nós</x-nav-button-link>
        <x-nav-button-link href="{{Auth::check() && Auth::user()->isAdmin() ? url('/fale-conosco') : url('/fale-conosco/create') }}" :active="Request()->routeIs('fale-conosco.*')">Fale Conosco</x-nav-button-link>
        @admin
          <x-nav-button-link href="{{ url('/clientes') }}" :active="Request()->routeIs('clientes.*')">Clientes</x-nav-button-link>
          <x-nav-button-link href="{{ url('/categorias') }}" :active="Request()->routeIs('categorias.*')">Categorias</x-nav-button-link>
        @endadmin
      </ul>
    </div>

    {{-- perfil fora do collapse — fica sempre visível e dropdown não é recortado --}}
    <ul class="navbar-nav ms-auto">
      {{-- Botão do WhatsApp --}}
      <li class="nav-item me-2">
        <a href="https://wa.me/556798781333" target="_blank" class="nav-link d-flex align-items-center text-success fw-semibold">
          <i class="bi bi-whatsapp me-1"></i> +55 67 99934-1014
        </a>
      </li>
      {{-- ÁREA DO USUÁRIO (JS controla) --}}
      <li id="user-menu" class="nav-item dropdown d-none">
        <a id="user-name-btn" class="nav-link dropdown-toggle d-flex align-items-center"
          href="#" role="button" data-bs-toggle="dropdown">
        </a>

        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="/perfil">Editar Perfil</a>
          <button id="logout-btn" class="dropdown-item">Sair</button>
        </div>
      </li>

      {{-- LINKS DE VISITANTE --}}
      <li id="guest-menu" class="nav-item d-none">
        <a class="nav-link" href="/login">Entrar</a>
      </li>
      <li id="guest-register" class="nav-item d-none">
        <a class="nav-link" href="/register">Registrar</a>
      </li>

    </ul>

  </div>
</nav>
