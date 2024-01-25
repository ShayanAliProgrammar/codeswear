@props([
    'variant' => 'default',
    'size' => 'default',
    'as' => 'button',
    'class' => '',
    'isLoading' => false,
])

@php
    $variants = [
        'default' => 'bg-primary text-primary-foreground shadow hover:bg-primary/90',
        'destructive' => 'bg-destructive text-destructive-foreground shadow-sm hover:bg-destructive/90',
        'outline' => 'border border-input bg-transparent shadow-sm hover:bg-accent hover:text-accent-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground shadow-sm hover:bg-secondary/80',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground',
        'link' => 'text-primary underline-offset-4 hover:underline',
    ];

    $sizes = [
        'default' => 'h-9 px-4 py-2',
        'sm' => 'h-8 rounded-md px-3 text-xs',
        'lg' => 'h-10 rounded-md px-8',
        'icon' => 'h-9 w-9',
    ];

    $variantClass = $variants[$variant] ?? $variants['default'];
    $sizeClass = $sizes[$size] ?? $sizes['default'];

    $classes = ['inline-flex items-center group justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50', $variantClass, $sizeClass, $class];

@endphp

<{{ $as }} {{ $attributes->twMerge(implode(' ', $classes)) }}>
    <x-icons.loader class='w-4 h-4 group-disabled:inline-block hidden animate-spin mr-0.5' />
    {{ $slot }}
    </{{ $as }}>
