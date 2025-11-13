@props(['label' => '', 'name', 'type' => 'text', 'placeholder' => '', 'value' => old($name), 'required' => false])

<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}" class="form-label fw-bold">{{ $label }}</label>
    @endif

    @if ($type === 'textarea')
        <textarea name="{{ $name }}" 
                  id="{{ $name }}" 
                  class="form-control @error($name) is-invalid @enderror"
                  placeholder="{{ $placeholder }}"
                  @if($required) required @endif>{{ $value }}</textarea>
    @else
        <input type="{{ $type }}"
               name="{{ $name }}"
               id="{{ $name }}"
               class="form-control @error($name) is-invalid @enderror"
               placeholder="{{ $placeholder }}"
               value="{{ $value }}"
               @if($required) required @endif>
    @endif

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
