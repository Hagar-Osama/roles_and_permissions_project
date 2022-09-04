@props(['active'])

@php
$classes = $active ?? false ? 'flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25': 'flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
