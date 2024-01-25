<x-layouts.admin title="Categories">
    <div class="flex md:flex-row md:gap-2 gap-4 flex-col">
        <x-sidebar>
            <x-ui.button as='a' :href="route('admin-product-categories')" variant='secondary' class="w-full justify-start">
                All Category
            </x-ui.button>

            <x-ui.button as='a' :href="route('admin-category-add')" variant='ghost' class="w-full justify-start">
                Add Category
            </x-ui.button>
        </x-sidebar>

        <section class="w-full max-w-6xl md:ml-3">
            <h1 class="text-4xl mb-4">Categories</h1>
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
                                            Name</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Slug
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-muted" on:visible='/build/show-alert-on-delete.js'>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground/80">
                                                {{ $category->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground/80">
                                                {{ $category->slug }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm flex">
                                                <x-ui.button as='a' :href="route('admin-category-edit', $category->id)" variant='link'>
                                                    Edit
                                                </x-ui.button>

                                                <x-ui.button data-target-form='#delete-form-{{ $category->id }}'
                                                    data-delete-button variant='destructive'>
                                                    Delete
                                                </x-ui.button>

                                                <form id='delete-form-{{ $category->id }}' hidden
                                                    action="{{ route('category-delete', $category->id) }}"
                                                    method="POST">
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
