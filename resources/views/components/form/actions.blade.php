<div class="d-flex justify-content-end">
    <a href="{{ $back ?? url()->previous() }}" class="btn btn-secondary me-2">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-save"></i> Salvar
    </button>
</div>
