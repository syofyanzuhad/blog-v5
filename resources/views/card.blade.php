{{--
Displays the digital business card view.
--}}

<x-app
    title="Syofyan Zuhad 🇵🇸 Digital Card"
    description="Digital business card for Syofyan Zuhad, Software Engineer."
>
    <div class="container xl:max-w-(--breakpoint-lg)">
        <x-typography.headline>
            Digital <span class="text-blue-600">Card</span>
        </x-typography.headline>

        <x-typography.subheadline class="mt-6 md:mt-10">
            Syofyan Zuhad 🇵🇸 &bull; Software Engineer
        </x-typography.subheadline>
    </div>

    <x-section id="card" class="mt-12 md:mt-16">
        <div class="flex justify-center items-center w-full">
            <div class="w-full max-w-[560px] min-h-[440px] flex justify-center">
                <iframe
                    src="https://card.laravel.cloud/@syofyanzuhad/embed"
                    width="100%"
                    height="440"
                    frameborder="0"
                    style="border:none;overflow:hidden;border-radius:24px;max-width:560px;width:100%;min-height:440px;"
                    allowtransparency="true"
                    title="Syofyan Zuhad 🇵🇸 Digital Card"
                ></iframe>
            </div>
        </div>
    </x-section>
</x-app>
