<!-- Hero -->
<section>
    <x-icons.polygon-bg-element class="fixed top-0 z-10 inset-x-0" />
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 z-20 relative lg:px-8 pt-36 pb-10">
        <!-- Announcement Banner -->
        <div class="flex justify-center">
            <x-ui.button as='a' target='_blank' variant='outline' class="rounded-full gap-x-2 h-min"
                href="https://wa.me/7078073838?text=Hi,%20I%20need%20a%20customized%20product%20from%20CodesWear">
                <span class="text-ellipsis">
                    Get custom designed products by sending us a text on WhatsApp
                </span>
                <x-ui.button as='span' class="rounded-full h-7 w-7">
                    😃
                </x-ui.button>
            </x-ui.button>
        </div>
        <!-- End Announcement Banner -->

        <!-- Title -->
        <div class="mt-5 max-w-2xl text-center mx-auto">
            <h1 class="block font-bold text-gray-800 text-4xl md:text-5xl lg:text-6xl dark:text-gray-200">
                Let's Wear The
                <span class="text-primary pl-3">Code</span>
            </h1>
        </div>
        <!-- End Title -->

        <div class="mt-5 max-w-3xl text-center mx-auto">
            <p class="text-lg text-gray-600 dark:text-gray-400">{{ env('APP_DESC') }}</p>
        </div>

        <!-- Buttons -->
        <div class="mt-8 gap-3 flex justify-center">
            <x-ui.button as='a' href="{{ route('all-products') }}">
                Get started
                <svg class="flex-shrink-0 w-3 h-3 ml-1" width="16" height="16" viewBox="0 0 16 16"
                    fill="none">
                    <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </x-ui.button>
        </div>
        <!-- End Buttons -->
    </div>
</section>
<!-- End Hero -->
