@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-4 py-2 rounded-xl bg-white/30 text-white font-semibold shadow transition'
    : 'inline-flex items-center px-4 py-2 rounded-xl text-pink-50 hover:bg-white/20 hover:text-white transition duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>