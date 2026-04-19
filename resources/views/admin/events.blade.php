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

        <button
            class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl font-bold shadow hover:opacity-90 transition">
            + Tambah Kategori
        </button>
    </div>

</header>

<div class="bg-white p-6 rounded-2xl shadow border">

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

    <!-- HEADER LIST -->
    <div class="grid grid-cols-12 px-4 py-2 mb-3 text-xs font-bold text-slate-500 uppercase">
        <div class="col-span-4">Event</div>
        <div class="col-span-2 text-center">Kategori</div>
        <div class="col-span-2 text-center">Harga</div>
        <div class="col-span-2 text-center">Stok</div>
        <div class="col-span-2 text-right">Aksi</div>
    </div>

    <!-- LIST -->
    <div class="space-y-4">

        <!-- ITEM 1 -->
        <div class="grid grid-cols-12 items-center p-4 rounded-xl 
            bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50 
            hover:from-blue-100 hover:via-purple-100 hover:to-pink-100 transition shadow-sm">

            <!-- EVENT -->
            <div class="col-span-4 flex items-center gap-4">
                <img src="{{ asset('assets/concert.png') }}"
                    class="w-16 h-20 rounded-lg object-cover">

                <div>
                    <p class="font-bold">Jazz Night 2024</p>
                    <p class="text-xs text-slate-400">16 Nov 2024</p>
                </div>
            </div>

            <!-- KATEGORI -->
            <div class="col-span-2 text-center">
                <span class="px-3 py-1 text-xs rounded-full 
                    bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
                    Musik
                </span>
            </div>

            <!-- HARGA -->
            <div class="col-span-2 text-center">
                <p class="font-semibold text-indigo-600">Rp 150.000</p>
            </div>

            <!-- STOK -->
            <div class="col-span-2">
                <p class="text-xs text-slate-400 mb-1 text-center">42 / 100</p>
                <div class="w-full bg-slate-200 h-2 rounded-full">
                    <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-2 rounded-full" style="width: 42%"></div>
                </div>
            </div>

            <!-- AKSI -->
            <div class="col-span-2 flex justify-end gap-2">
                <button class="px-3 py-1 text-xs bg-indigo-100 text-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white transition">
                    Edit
                </button>
                <button class="px-3 py-1 text-xs bg-red-100 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition">
                    Hapus
                </button>
            </div>

        </div>

        <!-- ITEM 2 -->
        <div class="grid grid-cols-12 items-center p-4 rounded-xl 
            bg-gradient-to-r from-green-50 via-emerald-50 to-teal-50 
            hover:from-green-100 hover:via-emerald-100 hover:to-teal-100 transition shadow-sm">

            <div class="col-span-4 flex items-center gap-4">
                <img src="{{ asset('assets/workshop.png') }}"
                    class="w-16 h-20 rounded-lg object-cover">

                <div>
                    <p class="font-bold">AI Workshop</p>
                    <p class="text-xs text-slate-400">26 Oct 2024</p>
                </div>
            </div>

            <div class="col-span-2 text-center">
                <span class="px-3 py-1 text-xs rounded-full 
                    bg-gradient-to-r from-green-500 to-emerald-500 text-white">
                    Workshop
                </span>
            </div>

            <div class="col-span-2 text-center">
                <p class="font-semibold text-indigo-600">Rp 50.000</p>
            </div>

            <div class="col-span-2">
                <p class="text-xs text-slate-400 mb-1 text-center">12 / 50</p>
                <div class="w-full bg-slate-200 h-2 rounded-full">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-2 rounded-full" style="width: 24%"></div>
                </div>
            </div>

            <div class="col-span-2 flex justify-end gap-2">
                <button class="px-3 py-1 text-xs bg-indigo-100 text-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white transition">
                    Edit
                </button>
                <button class="px-3 py-1 text-xs bg-red-100 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition">
                    Hapus
                </button>
            </div>

        </div>

    </div>

</div>

@endsection