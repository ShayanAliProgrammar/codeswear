<x-layouts.admin title="Products">
    <div class="flex md:flex-row md:gap-2 gap-4 flex-col">
        <x-sidebar>
            <x-ui.button as='a' :href="route('admin-products-all')" variant='secondary' class="w-full justify-start">
                All Product
            </x-ui.button>

            <x-ui.button as='a' :href="route('admin-product-add')" variant='ghost' class="w-full justify-start">
                Add Product
            </x-ui.button>
        </x-sidebar>

        <section class="w-full max-w-6xl md:ml-3">
            <h1 class="text-4xl mb-4">Products</h1>
            <hr />

            <div class="flex flex-col mt-10">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-muted">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Title</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Main Image</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Colors</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-muted" on:visible='/build/show-alert-on-delete.js'>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground/80">
                                                {{ $product->title }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground/80">
                                                <img src="/storage/{{ $product->main_image }}" loading='lazy'
                                                    class="w-10 rounded-sm" width='80px' decoding="async"
                                                    role='presentation' fetchpriority='low'>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground/80">
                                                <div
                                                    class="grid place-items-center [&>div]:col-span-1 grid-cols-5 gap-2">
                                                    @foreach (json_decode($product->colors) as $color)
                                                        <div style='background: {{ $color }}'
                                                            class="p-2 rounded-full w-4 h-4"></div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm flex">
                                                <x-ui.button as='a' :href="route('admin-product-edit', $product->id)" variant='link'>
                                                    Edit
                                                </x-ui.button>

                                                <x-ui.button data-target-form='#delete-form-{{ $product->id }}'
                                                    data-delete-button variant='destructive'>
                                                    Delete
                                                </x-ui.button>

                                                <form id='delete-form-{{ $product->id }}' hidden
                                                    action="{{ route('product-delete', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-ui.button type='submit'>
                                                        Delete
                                                    </x-ui.button>
                                                </form>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.admin>
