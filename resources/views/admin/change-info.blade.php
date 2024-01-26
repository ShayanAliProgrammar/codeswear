<x-layouts.admin title="Change Info">
    <div class="flex md:flex-row md:gap-2 gap-4 flex-col">

        <x-sidebar>
            <x-ui.button as='a' :href="route('admin-dashboard')" variant='ghost' class="w-full justify-start">
                Dashboard
            </x-ui.button>
            <x-ui.button as='a' :href="route('admin-change-info')" variant='secondary' class="w-full justify-start">
                Change About Info
            </x-ui.button>
        </x-sidebar>

        <section class="w-full max-w-6xl md:ml-3">
            <h1 class="text-4xl mb-4">Change Info</h1>
            <hr />

            <form action="{{ route('change-about-info') }}" method="post" autocomplete="off">
                @csrf
                @method('POST')
                <div class="max-w-lg py-10 w-full [&>*]:w-full grid place-items-center h-full mx-auto gap-3">
                    <div class="grid gap-2">
                        <x-ui.label for="about_text">About {{ config('app.name') }}</x-ui.label>
                        <x-ui.textarea id="about_text" name='about_text' type="text">{{ $about_info->about_text }}</x-ui.textarea>
                        @error('about_text')
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
</x-layouts.admin>