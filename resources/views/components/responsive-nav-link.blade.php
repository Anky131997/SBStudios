@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link d-md-none fw-bold'
            : 'nav-link d-md-none fw-bold';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
