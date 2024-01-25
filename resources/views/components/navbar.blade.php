<header
    class="fixed top-0 inset-x-0 h-16 border-b border-muted/40 backdrop-blur-md flex items-center justify-center z-[60]">
    <nav class="container max-w-7xl flex items-center justify-around">
        <div class="logo">
            <a href="{{ route('home') }}" class="text-xl font-bold cursor-pointer">
                <x-icons.logo class="h-10 w-40" />
                <span class="sr-only">{{ config('app.name') }}</span>
            </a>
        </div>
        <ul class="flex ml-auto items-center justify-center gap-5">
            <li>
                <a class="font-medium text-muted-foreground transition-colors duration-150 hover:text-primary"
                    href="{{ route('about') }}">About</a>
            </li>
            <li>
                <a class="font-medium text-muted-foreground transition-colors duration-150 hover:text-primary"
                    href="{{ route('all-products') }}">Products</a>
            </li>
        </ul>
    </nav>
</header>
