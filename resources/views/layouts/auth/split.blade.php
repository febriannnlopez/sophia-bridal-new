<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        @include('partials.head')
    </head>
   <body class="min-h-screen bg-bridal-cream text-bridal-dark antialiased" data-flux-appearance="light">
        <div class="relative grid min-h-dvh items-center justify-center lg:max-w-none lg:grid-cols-2">
            {{-- ============================================================
                 LEFT PANE: Bridal Hero Image + Branding (hidden on mobile)
                 ============================================================ --}}
            <div class="relative hidden h-dvh w-full overflow-hidden lg:flex lg:flex-col">
                {{-- Background image --}}
                <div
                    class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                    style="background-image: url('https://images.unsplash.com/photo-1606216794074-735e91aa2c92?w=1600&q=80');"
                ></div>

                {{-- Dark overlay gradient untuk text contrast --}}
               <div class="absolute inset-0 bg-gradient-to-br from-black/50 via-black/30 to-bridal-primary/40"></div>

                {{-- Top: Logo & Brand Name --}}
                <div class="relative z-20 flex items-center gap-3 p-10">
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-bridal-primary shadow-lg">
                        <x-app-logo-icon class="h-7 fill-current text-white" />
                    </span>
                    <div>
                        <p class="font-display text-2xl font-bold text-white tracking-wide">{{ config('app.name', 'Sophia Bridal') }}</p>
                        <p class="text-xs text-white/80 tracking-widest uppercase">Photography & Bridal Studio</p>
                    </div>
                </div>

                {{-- Bottom: Tagline --}}
                <div class="relative z-20 mt-auto p-10">
                    <blockquote class="space-y-4 max-w-md">
                        <p class="font-display text-3xl xl:text-4xl font-medium text-white leading-tight">
                            &ldquo;Wujudkan momen sakral pernikahan Anda dengan sentuhan elegan kami.&rdquo;
                        </p>
                        <footer class="text-white/80 text-sm tracking-wider">
                            — Sophia Bridal Pekanbaru, sejak 2015
                        </footer>
                    </blockquote>
                </div>
            </div>

            {{-- ============================================================
                 RIGHT PANE: Form
                 ============================================================ --}}
            <div class="w-full bg-white lg:bg-bridal-cream p-6 sm:p-8 lg:p-12">
                <div class="mx-auto flex w-full max-w-md flex-col justify-center space-y-6 min-h-dvh lg:min-h-fit">

                    {{-- Mobile-only logo --}}
                    <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 lg:hidden" wire:navigate>
                        <span class="flex h-12 w-12 items-center justify-center rounded-full bg-bridal-primary">
                            <x-app-logo-icon class="h-7 fill-current text-white" />
                        </span>
                        <p class="font-display text-xl font-bold text-bridal-dark">{{ config('app.name', 'Sophia Bridal') }}</p>
                    </a>

                    {{-- Form slot --}}
                    {{ $slot }}

                    {{-- Footer --}}
                    <p class="text-center text-xs text-bridal-secondary mt-8">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Sophia Bridal') }}. Semua hak dilindungi.
                    </p>
                </div>
            </div>
        </div>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
