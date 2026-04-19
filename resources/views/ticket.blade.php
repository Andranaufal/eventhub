@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-indigo-100 p-10">

    <!-- Header -->
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-black text-slate-800">E-Ticket</h1>
        <p class="text-slate-500">Detail tiket yang sudah Anda beli</p>
    </div>

    <!-- Card Container -->
    <div class="flex justify-center">
        <div class="max-w-md w-full">

            <!-- Success -->
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3 shadow">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800">Pembayaran Berhasil</h2>
                <p class="text-sm text-slate-500">Tiket Anda siap digunakan</p>
            </div>

            <!-- Ticket -->
            <div class="rounded-[2rem] overflow-hidden shadow-2xl bg-white/80 backdrop-blur border border-white">

                <!-- Header -->
                <div class="p-6 text-center bg-gradient-to-r from-indigo-500 to-indigo-700 text-white">
                    <p class="text-xs font-bold uppercase tracking-widest opacity-80">E-Ticket</p>
                    <h3 class="text-2xl font-black">Jazz Night 2024</h3>
                </div>

                <!-- Body -->
                <div class="p-6 space-y-4">

                    <div class="flex justify-between">
                        <span class="text-slate-500 text-sm">Nama</span>
                        <span class="font-bold text-slate-800">Donni Prabowo</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-slate-500 text-sm">Tanggal</span>
                        <span class="font-bold text-slate-800">16 Nov, 19:30</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-slate-500 text-sm">Order ID</span>
                        <span class="font-mono font-bold text-indigo-600">TRX-99210</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-slate-500 text-sm">Lokasi</span>
                        <span class="font-bold text-slate-800">Blue Note Lounge</span>
                    </div>

                </div>

                <!-- QR -->
                <div class="p-6 border-t text-center bg-slate-50">
                    <p class="text-xs text-slate-500 mb-3">Scan untuk Check-in</p>

                    <div class="w-40 h-40 bg-white mx-auto rounded-xl flex items-center justify-center shadow-inner border">
                        <span class="text-xs text-slate-400">QR Code</span>
                    </div>

                    <p class="mt-3 font-mono text-sm font-bold text-slate-700">TKT-001293848</p>
                </div>

                <!-- Action -->
                <div class="p-6 border-t space-y-3">

                    <button onclick="window.print()"
                        class="w-full py-3 rounded-xl font-bold text-white 
                               bg-gradient-to-r from-indigo-500 to-indigo-700 
                               hover:scale-105 transition shadow-lg">
                        Cetak / Simpan PDF
                    </button>

                    <a href="{{ route('home') }}"
                        class="block text-center text-sm text-slate-500 hover:text-indigo-600 font-bold">
                        Kembali ke Beranda
                    </a>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection