<x-layouts.admin title="Products">
    <div class="flex md:flex-row md:gap-2 gap-4 flex-col">
        <x-sidebar>
            <x-ui.button as='a' :href="route('admin-products-all')" variant='ghost' class="w-full justify-start">
                All Product
            </x-ui.button>

            <x-ui.button as='a' :href="route('admin-product-add')" variant='secondary' class="w-full justify-start">
                Add Product
            </x-ui.button>
        </x-sidebar>


        <section class="w-full max-w-6xl md:ml-3">
            <h1 class="text-4xl mb-4">Products</h1>
            <hr />

            <form enctype="multipart/form-data" action="{{ route('product-add') }}" method="post" autocomplete="off">
                @csrf
                @method('POST')
                <div class="max-w-lg py-10 w-full [&>*]:w-full grid place-items-center h-full mx-auto gap-3">
                    <div class="grid gap-2">
                        <x-ui.label for="title">Title</x-ui.label>
                        <x-ui.input id="title" name='title' type="text" :value="old('title')" />
                        @error('title')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid gap-2">
                        <x-ui.label for="price">Price</x-ui.label>
                        <x-ui.input id="price" name='price' type="text" :value="old('price')" />
                        @error('price')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid gap-2">
                        <x-ui.label for="description">Description</x-ui.label>
                        <x-ui.input id="description" name='description' type="text" :value="old('description')" />
                        @error('description')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-2">
                        <x-ui.label for="product_details">Product Details</x-ui.label>
                        <x-ui.textarea id="product_details" name='product_details' type="text"
                            :value="old('product_details')"></x-ui.textarea>
                        @error('product_details')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-2">
                        <x-ui.label for="category">Category</x-ui.label>
                        <select
                            class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"
                            id="category" name='category' type="text" :value="old('category')">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-2">
                        <x-ui.label>Colors</x-ui.label>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center flex-wrap max-w-[200px]">
                                <input type='color' name='colors[]' data-addable='color' multiple />
                            </div>

                            <x-ui.button type='button' class='addButton' on:visible='/build/addColorField.js'
                                size='icon' variant='outline'><x-icons.plus class="w-4 h-4" /></x-ui.button>
                        </div>
                        @error('colors')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-2">
                        <x-ui.label>Sizes</x-ui.label>
                        <div class="flex items-center justify-between">
                            <div class="flex gap-2 items-center flex-wrap max-w-[200px]">
                                @if (old('sizes'))
                                    @foreach (old('sizes') as $size)
                                        <x-ui.input type='text' class="max-w-[50px]" name='sizes[]'
                                            data-addable='text' multiple :value='$size' />
                                    @endforeach
                                @else
                                    <x-ui.input type='text' class="max-w-[50px]" name='sizes[]' data-addable='text'
                                        multiple />
                                @endif
                            </div>

                            <x-ui.button type='button' class='addButton' on:visible='/build/addColorField.js'
                                size='icon' variant='outline'><x-icons.plus class="w-4 h-4" /></x-ui.button>
                        </div>
                        @error('sizes')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-2">
                        <x-ui.label>Designs</x-ui.label>
                        <div class="flex items-center justify-between">
                            <div class="flex gap-2 items-center flex-wrap max-w-[200px]">
                                <x-ui.input type='text' name='designs[]' data-addable='text' multiple />
                            </div>

                            <x-ui.button type='button' class='addButton' on:visible='/build/addColorField.js'
                                size='icon' variant='outline'><x-icons.plus class="w-4 h-4" /></x-ui.button>
                        </div>
                        @error('designs')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="grid gap-2">
                        <span class="text-sm">
                            Main Image
                        </span>
                        <x-ui.label for="main_image" on:click='/build/image-select.js'
                            class="w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                            Select an Image
                        </x-ui.label>
                        <input id="main_image" hidden accept="image/*" name='main_image' type="file" />
                        @error('main_image')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-2">
                        <span class="text-sm">
                            Products Images
                        </span>
                        <x-ui.label for="product_images" on:click='/build/image-select.js'
                            class="w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring flex items-center flex-wrap gap-2 [&>img]:rounded-sm">
                            Select Images
                        </x-ui.label>
                        <input id="product_images" hidden name='product_images[]' type="file" multiple
                            accept="image/*" />
                        @error('product_images')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-ui.button class="mt-4" type='submit'>
                        Submit
                    </x-ui.button>
                </div>
            </form>

        </section>
    </div>

    @if (session('error'))
        <x-ui.toast variant='destructive'>
            {{ session('error') }}
        </x-ui.toast>
    @endif

    @if (session('success'))
        <x-ui.toast>
            {{ session('success') }}
        </x-ui.toast>
    @endif

</x-layouts.admin>
