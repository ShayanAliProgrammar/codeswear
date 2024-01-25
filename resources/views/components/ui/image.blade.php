@props(['alt' => false, 'src', 'fetchpriority' => 'low'])

@if ($fetchpriority === 'high')
    @push('head')
        <link rel="prefetch" href="{{ $src }}">
    @endpush
@endif

<img {{ $attributes->twMerge() }} loading='lazy' decoding='async' fetchpriority='{{ $fetchpriority }}'
    {{ $alt == false && $alt == '' ? 'role=presentation' : 'alt=' . $alt }} src='{{ $src }}'>
