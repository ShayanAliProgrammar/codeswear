<x-layouts.admin title="Categories">
    <div class="flex md:flex-row md:gap-2 gap-4 flex-col">
        <x-sidebar>
            <x-ui.button as='a' :href="route('admin-product-categories')" variant='ghost' class="w-full justify-start">
                All Category
            </x-ui.button>

            <x-ui.button as='a' variant='secondary' class="w-full justify-start">
                Add Category
            </x-ui.button>
        </x-sidebar>


        <section class="w-full max-w-6xl md:ml-3">
            <h1 class="text-4xl mb-4">Categories</h1>
            <hr />

            <form action="{{ route('category-add') }}" method="post" autocomplete="off">
                @csrf
                @method('POST')
                <div class="max-w-lg py-10 w-full [&>*]:w-full grid place-items-center h-full mx-auto gap-3">
                    <div class="grid gap-2" on:visible="{{ asset('build/change-slug.js') }}">
                        <x-ui.label for="name">Name</x-ui.label>
                        <x-ui.input id="name" name='name' type="text" :value="old('name')" />
                        @error('name')
                            <p class="text-destructive text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid gap-2">
                        <x-ui.label for="slug">Slug</x-ui.label>
                        <x-ui.input id="slug" readonly name='slug' type="text" :value="old('slug')" />
                        @error('slug')
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
