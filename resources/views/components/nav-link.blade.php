@props(['active' => false, 'icon' => null])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-3 py-2 rounded bg-yellow-500 text-white font-semibold'
            : 'flex items-center px-3 py-2 rounded text-blue-100 hover:bg-blue-700 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <x-dynamic-component :component="'lucide-' . $icon" class="w-5 h-5 mr-2"/>
    @endif
    {{ $slot }}
</a>
