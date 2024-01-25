<x-layouts.app title="Products">
    <section class="flex flex-wrap-reverse gap-2 py-20 md:flex-nowrap">
        <div class="grid max-w-xl grid-cols-2 gap-2 images">
            @foreach (json_decode($product->product_images) as $image)
                <x-ui.image width='200px' class="object-contain h-full" :src="'/storage/' . $image" alt="Product Image" />
            @endforeach
        </div>
        <div class="max-w-xl ml-auto content">
            <h1 class="text-4xl">{{ $product->title }}</h1>
            <div class="my-2 prose text-justify prose-pink">
                {!! $product->product_details !!}
            </div>
            <h4 class="my-4 text-sm font-bold" style="margin: 20px 0;">Sizes</h4>
            <div class="flex flex-wrap gap-2 mt-5">
                @foreach (json_decode($product->sizes) as $size)
                <x-ui.button variant='outline' size='icon'>{{$size}}</x-ui.button>
                @endforeach
            </div>
            <h4 class="my-4 text-sm font-bold" style="margin: 20px 0;">Colors</h4>
            <div class="flex flex-wrap gap-2 mt-5">
                @foreach (json_decode($product->colors) as $color)
                <x-ui.button style="background: {{ $color }} !important;" variant='outline' size='icon'></x-ui.button>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.app>
