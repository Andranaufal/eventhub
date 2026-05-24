@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="max-w-5xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
        <!-- Left -->
        <div class="flex-1 space-y-8">
            <span
                class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">
                #1 Event Platform
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                Temukan & Pesan
                <span class="text-indigo-600">
                    Tiket Event
                </span>
                Impianmu.
            </h1>
            <p class="text-lg text-slate-500 max-w-lg leading-relaxed">
                Dari konser musik hingga Seminar teknologi, semua ada di genggamanmu.
                Pesan aman & cepat dengan Midtrans.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#events"
                    class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-indigo-200 hover:scale-105 transition-transform flex items-center gap-2">
                    <i class="fa-solid fa-arrow-right w-5 h-5"></i>
                    Mulai Jelajah
                </a>
                <a href="#"
                    class="px-8 py-4 border-2 border-slate-200 rounded-2xl font-bold text-lg hover:border-indigo-600 hover:text-indigo-600 transition flex items-center gap-2">
                    <i class="fa-solid fa-circle-info w-5 h-5"></i>
                    Cara Pesan
                </a>
            </div>
        </div>
        <!-- Right -->
        <div class="flex-1 relative">
            <div
                class="absolute -top-10 -left-10 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
            </div>
            <div
                class="absolute -bottom-10 -right-10 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
            </div>
            <img
                src="{{ asset('assets/concert.png') }}"
                alt="Concert"
                class="rounded-[2rem] shadow-2xl relative z-10 w-full object-cover aspect-[4/5] object-center">
            <!-- Floating Card -->
            <div
                class="absolute -bottom-6 -left-6 glass p-6 rounded-2xl shadow-xl z-20 border border-white">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <i class="fa-solid fa-check text-xl"></i>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-bold uppercase">
                            Terverifikasi
                        </p>
                        <p class="font-bold">
                            Pembayaran Aman via Midtrans
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Events Section -->
    <section id="events" class="max-w-5xl mx-auto px-6 py-20">
        <!-- Header -->
        <div class="flex flex-col gap-8 mb-14">
            <!-- Title -->
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3">
                    Event Terdekat
                </h2>
                <p class="text-slate-500 text-lg">
                    Jangan sampai ketinggalan acara seru minggu ini!
                </p>
            </div>
            <!-- Categories -->
            <div class="flex flex-wrap gap-3">
                <!-- Semua -->
                <a href="/"
                    class="{{ request('category') == null
                        ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200'
                        : 'bg-white border border-slate-200 text-slate-700 hover:border-indigo-400 hover:text-indigo-600' }}
                    px-5 py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                    ✦ Semua
                </a>
                <!-- Dynamic Categories -->
                @foreach($categories as $cat)
                    <a href="?category={{ $cat->slug }}"
                        class="{{ request('category') == $cat->slug
                            ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200'
                            : 'bg-white border border-slate-200 text-slate-700 hover:border-indigo-400 hover:text-indigo-600' }}
                        px-5 py-2.5 rounded-full font-semibold text-sm transition-all duration-300">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <!-- Event Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <!-- Card -->
                <div
                    class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <!-- Image -->
                    <div class="relative overflow-hidden h-[360px]">
                        <img
                            src="https://placehold.co/600x800"
                            alt="{{ $event->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent">
                        </div>
                        <!-- Badge -->
                        <div
                            class="absolute top-5 left-5 px-4 py-2 bg-white/90 backdrop-blur-md rounded-xl text-xs font-bold uppercase tracking-wide text-indigo-600 shadow">
                            {{ $event->category->name }}
                        </div>
                        <!-- Title -->
                        <div class="absolute bottom-5 left-5 right-5 text-white">
                            <h3 class="text-2xl font-extrabold leading-tight mb-2">
                                {{ $event->title }}
                            </h3>
                            <div class="flex items-center gap-2 text-sm text-white/90">
                                <i class="fa-regular fa-clock"></i>
                                <span>
                                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y • H:i') }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Bottom -->
                    <div class="p-6 flex justify-between items-center">
                        <div>
                            <p class="text-sm text-slate-500 mb-1">
                                Harga Mulai
                            </p>
                            <h4 class="text-2xl font-black text-indigo-600">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            </h4>
                        </div>
                        <a href="{{ url('event/1') }}"
                            class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-indigo-200">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Partners Section -->
    <section id="partners" class="max-w-5xl mx-auto px-6 py-20">
        <div class="flex flex-col gap-8 mb-14">
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3">
                    Partner/Sponsor Resmi AmikomEventHub
                </h2>
                <p class="text-slate-500 text-lg">
                    AmikomEventHub bekerja sama dengan partner terpercaya untuk mendukung kategori event seperti:
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                @foreach($categories as $cat)
                    <span class="px-4 py-2 rounded-full border border-slate-200 text-sm text-slate-700 bg-slate-50">
                        {{ $cat->name }}
                    </span>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($partners as $partner)
                <div class="rounded-[2rem] border border-slate-200 p-6 bg-white shadow-md hover:shadow-xl transition">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="w-16 h-16 rounded-3xl bg-indigo-50 flex items-center justify-center overflow-hidden">
                            <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="max-h-14 object-contain">
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900">{{ $partner->name }}</h3>
                            <p class="text-sm text-slate-500">Partner dukungan platform</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 text-center text-slate-500 py-16 rounded-[2rem] border border-dashed border-slate-300 bg-slate-50">
                    Belum ada partner terdaftar saat ini.
                </div>
            @endforelse
        </div>
    </section>
@endsection