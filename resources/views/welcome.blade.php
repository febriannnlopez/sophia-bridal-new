<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    @include('partials.head')
</head>

<body class="bg-bridal-cream text-bridal-dark antialiased" data-flux-appearance="light">

    {{-- ============================================================
         NAVBAR
         ============================================================ --}}
    <nav x-data="{ scrolled: false, mobileOpen: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
        :class="scrolled ? 'bg-white/95 shadow-md backdrop-blur-sm' : 'bg-transparent'"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                {{-- Logo --}}
                <a href="#" class="flex items-center gap-3 group">
                    <span
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-bridal-primary shadow-md group-hover:scale-110 transition">
                        <x-app-logo-icon class="h-6 fill-current text-white" />
                    </span>
                    <div>
                        <p class="font-display text-xl font-bold text-bridal-dark leading-none">Sophia Bridal</p>
                        <p class="text-[10px] text-bridal-secondary tracking-widest uppercase mt-0.5">Photography Studio
                        </p>
                    </div>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden lg:flex items-center gap-8">
                    <a href="#home"
                        class="text-sm font-semibold text-bridal-dark hover:text-bridal-primary transition">Beranda</a>
                    <a href="#services"
                        class="text-sm font-semibold text-bridal-dark hover:text-bridal-primary transition">Layanan</a>
                    <a href="#gallery"
                        class="text-sm font-semibold text-bridal-dark hover:text-bridal-primary transition">Galeri</a>
                    <a href="#testimonials"
                        class="text-sm font-semibold text-bridal-dark hover:text-bridal-primary transition">Testimoni</a>
                    <a href="#contact"
                        class="text-sm font-semibold text-bridal-dark hover:text-bridal-primary transition">Kontak</a>
                </div>

                {{-- CTA Buttons --}}
                <div class="hidden lg:flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-sm font-semibold text-bridal-dark hover:text-bridal-primary transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-semibold text-bridal-dark hover:text-bridal-primary transition">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-5 py-2.5 bg-bridal-primary hover:bg-bridal-primary-dark text-white text-sm font-semibold rounded-full shadow-md hover:shadow-lg transition">
                            Daftar Sekarang
                        </a>
                    @endauth
                </div>

                {{-- Mobile Menu Button --}}
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden text-bridal-dark p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" x-show="!mobileOpen"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"
                            x-show="mobileOpen"></path>
                    </svg>
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="mobileOpen" x-transition class="lg:hidden bg-white rounded-lg shadow-lg my-2 p-4 space-y-2">
                <a href="#home" @click="mobileOpen = false"
                    class="block py-2 text-sm font-semibold text-bridal-dark">Beranda</a>
                <a href="#services" @click="mobileOpen = false"
                    class="block py-2 text-sm font-semibold text-bridal-dark">Layanan</a>
                <a href="#gallery" @click="mobileOpen = false"
                    class="block py-2 text-sm font-semibold text-bridal-dark">Galeri</a>
                <a href="#testimonials" @click="mobileOpen = false"
                    class="block py-2 text-sm font-semibold text-bridal-dark">Testimoni</a>
                <a href="#contact" @click="mobileOpen = false"
                    class="block py-2 text-sm font-semibold text-bridal-dark">Kontak</a>
                <div class="border-t pt-3 mt-2 flex flex-col gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="block py-2 text-sm font-semibold text-bridal-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block py-2 text-sm font-semibold text-bridal-dark">Masuk</a>
                        <a href="{{ route('register') }}"
                            class="block px-4 py-2 bg-bridal-primary text-white text-center text-sm font-semibold rounded-full">Daftar
                            Sekarang</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- ============================================================
         HERO SECTION
         ============================================================ --}}
    <section id="home" class="relative min-h-screen flex items-center pt-20">
        {{-- Background image --}}
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1606216794074-735e91aa2c92?w=1920&q=80');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-bridal-dark/85 via-bridal-dark/60 to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="max-w-2xl">
                <p class="text-bridal-primary-light text-sm tracking-[0.3em] uppercase mb-4 font-semibold">
                    ✦ Sophia Bridal Pekanbaru ✦
                </p>
                <h1 class="font-display text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6">
                    Wujudkan Momen <em class="text-gradient-gold not-italic">Sakral</em> Anda
                </h1>
                <p class="text-lg md:text-xl text-white/90 mb-8 leading-relaxed">
                    Studio Photography & Bridal terpercaya di Pekanbaru sejak 2015. Layanan lengkap wedding, prewedding,
                    makeup, dan penyewaan ratusan koleksi gaun eksklusif.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#services"
                        class="inline-flex items-center justify-center px-8 py-4 bg-bridal-primary hover:bg-bridal-primary-dark text-white font-semibold rounded-full shadow-xl hover:shadow-2xl transition text-base">
                        Lihat Layanan Kami
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center justify-center px-8 py-4 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white font-semibold rounded-full border border-white/30 transition text-base">
                        Pesan Sekarang
                    </a>
                </div>

                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-6 mt-12 max-w-lg">
                    <div>
                        <p class="font-display text-3xl md:text-4xl font-bold text-bridal-primary-light">10+</p>
                        <p class="text-xs md:text-sm text-white/80 mt-1">Tahun Pengalaman</p>
                    </div>
                    <div>
                        <p class="font-display text-3xl md:text-4xl font-bold text-bridal-primary-light">1000+</p>
                        <p class="text-xs md:text-sm text-white/80 mt-1">Pasangan Bahagia</p>
                    </div>
                    <div>
                        <p class="font-display text-3xl md:text-4xl font-bold text-bridal-primary-light">4.9★</p>
                        <p class="text-xs md:text-sm text-white/80 mt-1">Rating Google</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 hidden md:block animate-bounce">
            <a href="#services" class="text-white/70 hover:text-white">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>
    </section>

    {{-- ============================================================
         SERVICES SECTION
         ============================================================ --}}
    <section id="services" class="py-20 lg:py-28 bg-bridal-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section header --}}
            <div class="text-center max-w-3xl mx-auto mb-16">
                <p class="text-bridal-primary text-sm tracking-[0.3em] uppercase mb-4 font-semibold">— Layanan Kami —
                </p>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-bridal-dark mb-6">
                    Layanan Lengkap untuk <em class="text-gradient-gold not-italic">Setiap Momen</em>
                </h2>
                <p class="text-base md:text-lg text-bridal-secondary leading-relaxed">
                    Dari pernikahan, wisuda, foto keluarga, hingga sewa gaun — kami siap mewujudkan momen spesial Anda
                    dengan sentuhan profesional.
                </p>
            </div>

            {{-- Services grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @php
                    $services = [
                        [
                            'name' => 'Wedding',
                            'desc' => 'Paket wedding lengkap dengan photography, videography, makeup, dan sewa gaun.',
                            'price' => 'Mulai Rp 5.000.000',
                            'svg' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" d="M12 21V11m0 0c-2-2-4-3-7-3v10c3 0 5 1 7 3m0-10c2-2 4-3 7-3v10c-3 0-5 1-7 3M5 8V5h14v3M12 11V7m0 0L9 4m3 3l3-3"/>',
                        ],
                        [
                            'name' => 'Prewedding',
                            'desc' => 'Indoor & outdoor prewedding photography dengan multiple konsep dan lokasi.',
                            'price' => 'Mulai Rp 1.000.000',
                            'svg' =>
                                '<circle cx="9" cy="14" r="4" stroke-linecap="round" stroke-linejoin="round"/><circle cx="16" cy="14" r="4" stroke-linecap="round" stroke-linejoin="round"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 10V7l2-2m5 5V7l-2-2"/>',
                        ],
                        [
                            'name' => 'Family Photo',
                            'desc' => 'Abadikan kebersamaan keluarga dengan foto profesional indoor atau outdoor.',
                            'price' => 'Mulai Rp 500.000',
                            'svg' =>
                                '<circle cx="8" cy="6" r="2.5" stroke-linecap="round" stroke-linejoin="round"/><circle cx="16" cy="6" r="2.5" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="9" r="1.5" stroke-linecap="round" stroke-linejoin="round"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 20v-3a3 3 0 013-3h2m11 6v-3a3 3 0 00-3-3h-2m-4 6v-3a2 2 0 012-2h0a2 2 0 012 2v3"/>',
                        ],
                        [
                            'name' => 'Wisuda',
                            'desc' => 'Foto wisuda dengan sewa toga, kebaya, makeup, dan hairdo profesional.',
                            'price' => 'Mulai Rp 300.000',
                            'svg' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" d="M22 10L12 5 2 10l10 5 10-5zM6 12v5c0 2 3 3 6 3s6-1 6-3v-5M22 10v6"/>',
                        ],
                        [
                            'name' => 'Maternity',
                            'desc' => 'Foto kehamilan elegan dengan gaun maternity dan styling khusus.',
                            'price' => 'Mulai Rp 500.000',
                            'svg' =>
                                '<circle cx="12" cy="5" r="2.5" stroke-linecap="round" stroke-linejoin="round"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 10c0-1 1-2 3-2s3 1 3 2v3a4 4 0 01-1 3l-1 1c-.5.5-1 1.5-1 2v3h-2v-3c0-.5-.5-1.5-1-2l-1-1a4 4 0 01-1-3v-3z"/><circle cx="12" cy="14" r="2" stroke-linecap="round" stroke-linejoin="round"/>',
                        ],
                        [
                            'name' => 'Sewa Gaun',
                            'desc' => 'Ratusan koleksi gaun pengantin, pesta, kebaya, cheongsam, dan kostum tematik.',
                            'price' => 'Mulai Rp 150.000',
                            'svg' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3L9 6h6l-3-3zM9 6l-1 2 4 2 4-2-1-2M8 8l-4 12h16L16 8M12 11v9"/>',
                        ],
                    ];
                @endphp

                @foreach ($services as $service)
                    <div
                        class="group bg-white rounded-2xl p-8 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-bridal-light">
                        {{-- Icon container --}}
                        <div
                            class="w-16 h-16 mb-5 rounded-xl bg-bridal-primary/10 group-hover:bg-bridal-primary group-hover:scale-110 transition-all duration-300 flex items-center justify-center">
                            <svg class="w-9 h-9 text-bridal-primary group-hover:text-white transition-colors"
                                fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                {!! $service['svg'] !!}
                            </svg>
                        </div>

                        <h3
                            class="font-display text-2xl font-bold text-bridal-dark mb-3 group-hover:text-bridal-primary transition">
                            {{ $service['name'] }}
                        </h3>
                        <p class="text-bridal-secondary text-sm mb-4 leading-relaxed">{{ $service['desc'] }}</p>

                        <div class="flex items-center justify-between pt-4 border-t border-bridal-light">
                            <p class="text-bridal-primary font-bold text-sm">{{ $service['price'] }}</p>
                            <a href="{{ route('register') }}"
                                class="text-bridal-primary hover:text-bridal-primary-dark text-sm font-semibold inline-flex items-center gap-1">
                                Pesan
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         ABOUT SECTION
         ============================================================ --}}
    <section class="py-20 lg:py-28 bg-bridal-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                {{-- Image --}}
                <div class="relative">
                    <div class="aspect-[4/5] rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=800&q=80"
                            alt="Sophia Bridal Studio" class="w-full h-full object-cover">
                    </div>
                    {{-- Decorative card --}}
                    <div
                        class="absolute -bottom-6 -right-6 bg-bridal-primary text-white p-6 rounded-2xl shadow-xl max-w-xs hidden md:block">
                        <p class="font-display text-3xl font-bold">Sejak 2015</p>
                        <p class="text-sm mt-1 text-white/90">Melayani ribuan pasangan di Pekanbaru</p>
                    </div>
                </div>

                {{-- Content --}}
                <div>
                    <p class="text-bridal-primary text-sm tracking-[0.3em] uppercase mb-4 font-semibold">— Tentang Kami
                        —</p>
                    <h2 class="font-display text-4xl md:text-5xl font-bold text-bridal-dark mb-6 leading-tight">
                        Studio Bridal Terpercaya di <em class="text-gradient-gold not-italic">Pekanbaru</em>
                    </h2>
                    <p class="text-bridal-secondary leading-relaxed mb-4">
                        <strong>Sophia Bridal & Photography</strong> hadir sejak 2015 untuk mewujudkan momen sakral
                        Anda. Berlokasi strategis di Jl. Setia Budi No. 89, kami menyediakan layanan lengkap mulai dari
                        photography wedding, prewedding indoor & outdoor, hingga penyewaan ratusan koleksi gaun
                        pengantin, kebaya, dan busana tematik.
                    </p>
                    <p class="text-bridal-secondary leading-relaxed mb-6">
                        Tim profesional kami siap mendampingi Anda dengan sentuhan elegan, dari makeup pengantin hingga
                        sesi foto yang tak terlupakan. Sophia Bridal — di mana setiap detail penting.
                    </p>

                    {{-- Features --}}
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="flex items-start gap-3">
                            <span
                                class="flex-shrink-0 w-10 h-10 rounded-full bg-bridal-primary/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-bridal-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <div>
                                <p class="font-semibold text-bridal-dark text-sm">Tim Profesional</p>
                                <p class="text-xs text-bridal-secondary">Berpengalaman 10+ tahun</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span
                                class="flex-shrink-0 w-10 h-10 rounded-full bg-bridal-primary/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-bridal-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <div>
                                <p class="font-semibold text-bridal-dark text-sm">Koleksi Lengkap</p>
                                <p class="text-xs text-bridal-secondary">Ratusan pilihan gaun</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span
                                class="flex-shrink-0 w-10 h-10 rounded-full bg-bridal-primary/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-bridal-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <div>
                                <p class="font-semibold text-bridal-dark text-sm">Buka Setiap Hari</p>
                                <p class="text-xs text-bridal-secondary">08:00 - 19:00 WIB</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span
                                class="flex-shrink-0 w-10 h-10 rounded-full bg-bridal-primary/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-bridal-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <div>
                                <p class="font-semibold text-bridal-dark text-sm">Rating 4.9★</p>
                                <p class="text-xs text-bridal-secondary">144+ ulasan Google</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('register') }}"
                        class="inline-flex items-center px-8 py-4 bg-bridal-primary hover:bg-bridal-primary-dark text-white font-semibold rounded-full shadow-lg transition">
                        Mulai Konsultasi
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         GALLERY SECTION
         ============================================================ --}}
    <section id="gallery" class="py-20 lg:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <p class="text-bridal-primary text-sm tracking-[0.3em] uppercase mb-4 font-semibold">— Portfolio —</p>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-bridal-dark mb-6">
                    Karya <em class="text-gradient-gold not-italic">Terbaik</em> Kami
                </h2>
                <p class="text-base md:text-lg text-bridal-secondary leading-relaxed">
                    Lihat momen-momen indah yang telah kami abadikan untuk pasangan dan keluarga di Pekanbaru.
                </p>
            </div>

            {{-- Gallery grid (asymmetric) --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 lg:gap-4">
                @php
                    $galleries = [
                        [
                            'url' => 'https://images.unsplash.com/photo-1606216794074-735e91aa2c92?w=800&q=80',
                            'span' => 'col-span-2 row-span-2',
                            'h' => 'h-full',
                        ],
                        [
                            'url' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=400&q=80',
                            'span' => '',
                            'h' => 'h-64',
                        ],
                        [
                            'url' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=400&q=80',
                            'span' => '',
                            'h' => 'h-64',
                        ],
                        [
                            'url' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=400&q=80',
                            'span' => '',
                            'h' => 'h-64',
                        ],
                        [
                            'url' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=400&q=80',
                            'span' => '',
                            'h' => 'h-64',
                        ],
                        [
                            'url' => 'https://images.unsplash.com/photo-1606800052052-a08af7148866?w=800&q=80',
                            'span' => 'col-span-2',
                            'h' => 'h-64',
                        ],
                    ];
                @endphp

                @foreach ($galleries as $g)
                    <div class="{{ $g['span'] }} overflow-hidden rounded-xl group cursor-pointer">
                        <img src="{{ $g['url'] }}" alt="Sophia Bridal Gallery"
                            class="w-full {{ $g['h'] }} object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-8 py-3 border-2 border-bridal-primary text-bridal-primary hover:bg-bridal-primary hover:text-white font-semibold rounded-full transition">
                    Lihat Galeri Lengkap
                </a>
            </div>
        </div>
    </section>

    {{-- ============================================================
         TESTIMONIALS SECTION
         ============================================================ --}}
    <section id="testimonials" class="py-20 lg:py-28 bg-bridal-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <p class="text-bridal-primary text-sm tracking-[0.3em] uppercase mb-4 font-semibold">— Testimoni —</p>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-bridal-dark mb-6">
                    Cerita Pelanggan <em class="text-gradient-gold not-italic">Bahagia</em>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $testimonials = [
                        [
                            'name' => 'Rudy & Julita',
                            'role' => 'Wedding 2024',
                            'text' =>
                                'Pelayanan Sophia Bridal luar biasa! Dari konsultasi awal hingga hari H, semua di-handle profesional. Foto wedding kami sempurna!',
                            'rating' => 5,
                        ],
                        [
                            'name' => 'Sarah Wijaya',
                            'role' => 'Prewedding',
                            'text' =>
                                'Hasil prewedding kami melampaui ekspektasi. Tim makeup dan photographer sangat ramah dan profesional. Recommended banget!',
                            'rating' => 5,
                        ],
                        [
                            'name' => 'Keluarga Tanaka',
                            'role' => 'Family Photo',
                            'text' =>
                                'Pengalaman foto keluarga pertama kami sangat menyenangkan. Anak-anak nyaman, hasil foto pun memukau. Terima kasih Sophia!',
                            'rating' => 5,
                        ],
                    ];
                @endphp

                @foreach ($testimonials as $t)
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition">
                        {{-- Stars --}}
                        <div class="flex gap-1 mb-4">
                            @for ($i = 0; $i < $t['rating']; $i++)
                                <svg class="w-5 h-5 text-bridal-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>

                        {{-- Text --}}
                        <p class="text-bridal-dark leading-relaxed mb-6 italic">&ldquo;{{ $t['text'] }}&rdquo;</p>

                        {{-- Author --}}
                        <div class="flex items-center gap-3 pt-4 border-t border-bridal-light">
                            <div
                                class="w-12 h-12 rounded-full bg-bridal-primary/20 flex items-center justify-center font-bold text-bridal-primary">
                                {{ substr($t['name'], 0, 1) }}
                            </div>
                            <div>
                                <p class="font-semibold text-bridal-dark">{{ $t['name'] }}</p>
                                <p class="text-xs text-bridal-secondary">{{ $t['role'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         CTA SECTION
         ============================================================ --}}
    <section class="py-20 lg:py-28 bg-bridal-dark relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1920&q=80');">
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-bridal-primary-light text-sm tracking-[0.3em] uppercase mb-4 font-semibold">— Siap Memulai?
                —</p>
            <h2 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                Wujudkan Momen <em class="text-gradient-gold not-italic">Impian</em> Anda Hari Ini
            </h2>
            <p class="text-lg text-white/80 mb-10 max-w-2xl mx-auto leading-relaxed">
                Daftarkan akun Anda dan mulai konsultasi gratis dengan tim Sophia Bridal. Wujudkan momen tak terlupakan
                bersama kami.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-10 py-4 bg-bridal-primary hover:bg-bridal-primary-dark text-white font-semibold rounded-full shadow-2xl transition text-base">
                    Daftar Gratis Sekarang
                </a>
                <a href="https://wa.me/6281287799710" target="_blank"
                    class="inline-flex items-center justify-center px-10 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white font-semibold rounded-full border border-white/30 transition text-base">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                    </svg>
                    Chat WhatsApp
                </a>
            </div>
        </div>
    </section>

    {{-- ============================================================
         FOOTER
         ============================================================ --}}
    <footer id="contact" class="bg-bridal-dark text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

                {{-- Brand --}}
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="flex h-11 w-11 items-center justify-center rounded-full bg-bridal-primary">
                            <x-app-logo-icon class="h-6 fill-current text-white" />
                        </span>
                        <div>
                            <p class="font-display text-xl font-bold leading-none">Sophia Bridal</p>
                            <p class="text-[10px] text-white/60 tracking-widest uppercase mt-0.5">Photography Studio
                            </p>
                        </div>
                    </div>
                    <p class="text-sm text-white/70 leading-relaxed mb-4">
                        Studio bridal terpercaya di Pekanbaru sejak 2015. Mewujudkan momen sakral Anda dengan sentuhan
                        elegan.
                    </p>
                    <div class="flex gap-3">
                        <a href="https://instagram.com/sophiabridal_" target="_blank"
                            class="w-9 h-9 rounded-full bg-white/10 hover:bg-bridal-primary flex items-center justify-center transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="https://facebook.com/sophiapekanbaru.bridal" target="_blank"
                            class="w-9 h-9 rounded-full bg-white/10 hover:bg-bridal-primary flex items-center justify-center transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                        <a href="https://tiktok.com/@sophiabridal" target="_blank"
                            class="w-9 h-9 rounded-full bg-white/10 hover:bg-bridal-primary flex items-center justify-center transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5.8 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1.84-.1z" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h3 class="font-display font-bold text-lg mb-4">Layanan</h3>
                    <ul class="space-y-2 text-sm text-white/70">
                        <li><a href="#services" class="hover:text-bridal-primary transition">Wedding</a></li>
                        <li><a href="#services" class="hover:text-bridal-primary transition">Prewedding</a></li>
                        <li><a href="#services" class="hover:text-bridal-primary transition">Family Photo</a></li>
                        <li><a href="#services" class="hover:text-bridal-primary transition">Wisuda</a></li>
                        <li><a href="#services" class="hover:text-bridal-primary transition">Maternity</a></li>
                        <li><a href="#services" class="hover:text-bridal-primary transition">Sewa Gaun</a></li>
                    </ul>
                </div>

                {{-- Company --}}
                <div>
                    <h3 class="font-display font-bold text-lg mb-4">Perusahaan</h3>
                    <ul class="space-y-2 text-sm text-white/70">
                        <li><a href="#" class="hover:text-bridal-primary transition">Tentang Kami</a></li>
                        <li><a href="#gallery" class="hover:text-bridal-primary transition">Galeri</a></li>
                        <li><a href="#testimonials" class="hover:text-bridal-primary transition">Testimoni</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-bridal-primary transition">Daftar</a>
                        </li>
                        <li><a href="{{ route('login') }}" class="hover:text-bridal-primary transition">Masuk</a>
                        </li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h3 class="font-display font-bold text-lg mb-4">Kontak Kami</h3>
                    <ul class="space-y-3 text-sm text-white/70">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-bridal-primary" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Jl. Setia Budi No. 89 B-C, Pesisir, Lima Puluh, Pekanbaru, Riau 28144</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-bridal-primary" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <a href="https://wa.me/6281287799710" target="_blank"
                                class="hover:text-bridal-primary transition">+62 812-8779-9710</a>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-bridal-primary" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Buka setiap hari<br>08:00 - 19:00 WIB</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom --}}
            <div
                class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-white/60">
                    &copy; {{ date('Y') }} Sophia Bridal & Photography. Semua hak dilindungi.
                </p>
                <div class="flex gap-6 text-sm text-white/60">
                    <a href="#" class="hover:text-bridal-primary transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-bridal-primary transition">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- ============================================================
         ALPINE.JS (untuk navbar interactive)
         ============================================================ --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>
