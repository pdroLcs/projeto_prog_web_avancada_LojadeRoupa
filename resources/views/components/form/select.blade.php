@props(['label' => '', 'name', 'options' => [], 'selected' => old($name), 'required' => false,])

<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}" class="form-label fw-bold">{{ $label }}</label>
    @endif

    <select name="{{ $name }}" 
            id="{{ $name }}" 
            class="form-select @error($name) is-invalid @enderror"
            @if($required) required @endif>
        <option value="">Selecione...</option>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
