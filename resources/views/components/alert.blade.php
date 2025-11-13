@if (session($type ?? 'success'))
    <div class="alert alert-{{ $type ?? 'success' }} alert-dismissible fade show text-center" role="alert">
        {{ session($type ?? 'success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
@endif
