@props(['buttonText'])

<aside class="md:w-[240px] h-full flex-col md:border-none border-b w-full flex">
    <nav class="grid items-start gap-2">
        {{ $slot }}
    </nav>
</aside>
