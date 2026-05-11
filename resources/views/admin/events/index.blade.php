@extends('layouts.admin')

@section('content')

<header class="flex flex-col gap-6 mb-10">

    <div>
        <h1 class="text-3xl font-extrabold text-slate-800">Admin</h1>
        <p class="text-sm text-slate-500">Selamat datang kembali, Admin!</p>
    </div>

    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-black text-slate-800">Kelola Event</h1>
            <p class="text-sm text-slate-500">Atur semua event dalam satu tempat</p>
        </div>

        <a href="{{ route('admin.events.create') }}"
            class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl font-bold shadow hover:opacity-90 transition">
            + Tambah Event
        </a>
    </div>

</header>

<div class="bg-white p-6 rounded-2xl shadow border">

    {{-- ✅ NOTIFIKASI --}}
    @if(session('success'))
        <div class="mb-6 px-4 py-3 rounded-lg bg-green-100 text-green-700 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter -->
    <div class="flex gap-4 mb-6">
        <input type="text" placeholder="Cari event..."
            class="flex-1 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-indigo-500 outline-none">

        <select class="px-4 py-2 rounded-lg border">
            <option>Semua</option>
            <option>Musik</option>
            <option>Workshop</option>
        </select>
    </div>

    <!-- HEADER -->
    <div class="grid grid-cols-12 px-4 py-2 mb-3 text-xs font-bold text-slate-500 uppercase">
        <div class="col-span-4">Event</div>
        <div class="col-span-2 text-center">Kategori</div>
        <div class="col-span-2 text-center">Harga</div>
        <div class="col-span-2 text-center">Stok</div>
        <div class="col-span-2 text-right">Aksi</div>
    </div>

    <!-- LIST DATA -->
    <div class="space-y-4">

        @forelse($events as $event)

        @php
            $max = 100;
            $stock = $event->stock ?? 0;
            $percent = ($max > 0) ? ($stock / $max) * 100 : 0;
            $percent = min($percent, 100);

            if ($percent > 70) {
                $color = 'from-green-500 to-emerald-500';
                $bg = 'from-green-50 via-emerald-50 to-teal-50';
                $hover = 'hover:from-green-100 hover:via-emerald-100 hover:to-teal-100';
            } elseif ($percent > 30) {
                $color = 'from-indigo-500 to-purple-500';
                $bg = 'from-blue-50 via-purple-50 to-pink-50';
                $hover = 'hover:from-blue-100 hover:via-purple-100 hover:to-pink-100';
            } else {
                $color = 'from-red-500 to-pink-500';
                $bg = 'from-red-50 via-pink-50 to-rose-50';
                $hover = 'hover:from-red-100 hover:via-pink-100 hover:to-rose-100';
            }
        @endphp

        <div class="grid grid-cols-12 items-center p-4 rounded-xl 
            bg-gradient-to-r {{ $bg }} 
            {{ $hover }} transition shadow-sm">

            <!-- EVENT -->
            <div class="col-span-4 flex items-center gap-4">

                {{-- ✅ POSTER DINAMIS --}}
                @if($event->poster_path && file_exists(public_path('storage/' . $event->poster_path)))
                    <img src="{{ asset('storage/' . $event->poster_path) }}"
                        class="w-16 h-20 rounded-lg object-cover">
                @else
                    <img src="{{ asset('assets/concert.png') }}"
                        class="w-16 h-20 rounded-lg object-cover">
                @endif

                <div>
                    <p class="font-bold">{{ $event->title }}</p>
                    <p class="text-xs text-slate-400">
                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                    </p>
                </div>
            </div>

            <!-- KATEGORI -->
            <div class="col-span-2 text-center">
                <span class="px-3 py-1 text-xs rounded-full 
                    bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
                    {{ $event->category->name ?? '-' }}
                </span>
            </div>

            <!-- HARGA -->
            <div class="col-span-2 text-center">
                <p class="font-semibold text-indigo-600">
                    Rp {{ number_format($event->price ?? 0, 0, ',', '.') }}
                </p>
            </div>

            <!-- STOK -->
            <div class="col-span-2">
                <p class="text-xs text-slate-400 mb-1 text-center">
                    {{ $stock }} / {{ $max }}
                </p>

                <div class="w-full bg-slate-200 h-2 rounded-full">
                    <div class="bg-gradient-to-r {{ $color }} h-2 rounded-full"
                        style="width: {{ $percent }}%">
                    </div>
                </div>
            </div>

            <!-- AKSI -->
            <div class="col-span-2 flex justify-end gap-2">

                <a href="{{ route('admin.events.edit', $event->id) }}"
                    class="px-3 py-1 text-xs bg-indigo-100 text-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white transition">
                    Edit
                </a>

                <form action="{{ route('admin.events.destroy', $event->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus event ini?');">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="px-3 py-1 text-xs bg-red-100 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition">
                        Hapus
                    </button>
                </form>

            </div>

        </div>

        @empty
            <div class="text-center text-gray-500 py-10">
                Belum ada event 
            </div>
        @endforelse

    </div>

</div>

@endsection