@props(['href', 'active' => false])

<li {{ $attributes->merge(['class' => 'nav-item']) }}>
    <a href="{{ $href }}" class="nav-link {{ $active ? 'active' : '' }}" >
        {{ $slot }}
    </a>
</li>
