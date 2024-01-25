<x-layouts.app title="Products">
    <section class="flex items-center gap-2 py-20 container max-w-6xl flex-wrap">
        @foreach ($products as $product)
            <x-ui.card class="max-w-xs p-0">
                <a class="relative mb-3 h-64 flex w-full max-w-xs overflow-hidden rounded-xl"
                    href="{{ route('show-product', $product->id) }}">
                    <x-ui.image class="w-full object-contain" :src="'/storage/' . $product->main_image" alt="product image" />
                </a>
                <x-ui.card.content>
                    <a href="{{ route('show-product', $product->id) }}">
                        <x-ui.card.title class="text-xl">{{ $product->title }}</x-ui.card.tit>
                    </a>
                    <div class="mt-2 flex gap-2 flex-col">
                        <p class="block text-sm">
                            {{ $product->description }}
                        </p>
                        <span class="mb-2 text-lg font-bold">{{ $product->price }}</span>
                        <x-ui.button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to cart
                        </x-ui.button>
                    </div>
                </x-ui.card.content>
            </x-ui.card>
        @endforeach
    </section>
</x-layouts.app>
