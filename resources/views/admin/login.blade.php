<x-layouts.auth title='Login'>
    <section class="py-20 h-screen">
        @if (session('error'))
            <x-ui.toast variant='destructive'>
                {{ session('error') }}
            </x-ui.toast>
        @endif

        <x-ui.button as='a' :href="route('home')" variant='outline'
            class="absolute w-max sm:top-16 sm:left-16 top-10 left-8">
            <x-icons.back class="w-4 h-4" /> Back
        </x-ui.button>

        <form action="{{ route('login-admin') }}" method="POST" autocomplete="off">
            @csrf
            @method('POST')

            <div class="max-w-sm grid place-items-center h-full mx-auto">
                <x-ui.card>
                    <x-ui.card.header>
                        <x-ui.card.title>Login</x-ui.card.title>
                        <x-ui.card.description>Enter correct credentials below to login to admin
                            dashboard
                        </x-ui.card.description>
                    </x-ui.card.header>
                    <x-ui.card.content class="space-y-2">
                        <div class="grid gap-2">
                            <x-ui.label for="name">Name</x-ui.label>
                            <x-ui.input id="name" name='name' type="name" :value="old('name')" />
                            @error('name')
                                <p class="text-destructive text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid gap-2">
                            <x-ui.label for="password">Password</x-ui.label>
                            <x-ui.input id="password" name='password' type="password" />
                            @error('password')
                                <p class="text-destructive text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </x-ui.card.content>
                    <div class="flex items-center p-6 pt-0">
                        <x-ui.button type='submit' class="w-full">Login</x-ui.button>
                    </div>
                </x-ui.card>
            </div>
        </form>
    </section>
</x-layouts.auth>
