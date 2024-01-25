<header class="sticky top-0 z-40 border-b backdrop-blur-md">
    <div class="container flex h-16 items-center justify-between py-4">
        <div class="flex gap-6 md:gap-10">
            <a href="{{ route('admin-dashboard') }}">
                <x-icons.logo class="w-32 h-10" />
                <span class="sr-only">{{ config('app.name') }}</span>
            </a>
            <nav class="gap-3 flex">
                <a class="font-medium text-sm flex items-center text-muted-foreground transition-colors duration-150 hover:text-primary"
                    href="{{ route('admin-product-categories') }}">Categories</a>
                <a class="font-medium text-sm flex items-center text-muted-foreground transition-colors duration-150 hover:text-primary"
                    href="{{ route('admin-products-all') }}">Products</a>
            </nav>
        </div>
    </div>
</header>
