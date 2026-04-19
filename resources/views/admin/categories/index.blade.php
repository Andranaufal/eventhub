@extends('layouts.admin')

@section('content')

<header class="flex flex-col gap-6 mb-10">

    <div>
        <h1 class="text-3xl font-extrabold text-slate-800">Admin</h1>
        <p class="text-sm text-slate-500">Selamat datang kembali, Admin!</p>
    </div>

    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-black text-slate-800">Kelola Kategori</h1>
            <p class="text-sm text-slate-500">Atur kategori event yang tersedia</p>
        </div>

        <button
            class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl font-bold shadow hover:opacity-90 transition">
            + Tambah Kategori
        </button>
    </div>

</header>
<div class="bg-white rounded-2xl border shadow overflow-hidden">

    <!-- Search -->
    <div class="px-6 py-4 bg-gradient-to-r from-slate-50 to-slate-100 border-b">
        <input type="text" placeholder="Cari nama kategori..."
            class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-indigo-500 outline-none">
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">

            <!-- HEADER -->
            <thead class="bg-gradient-to-r from-indigo-50 to-purple-50 text-slate-600 text-xs uppercase font-bold">
                <tr>
                    <th class="px-6 py-4 w-16">No</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Deskripsi</th>
                    <th class="px-6 py-4 text-center">Jumlah Event</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody class="divide-y">

                <!-- ROW 1 -->
                <tr class="bg-gradient-to-r from-red-50 to-pink-50 hover:from-red-100 hover:to-pink-100 transition">
                    <td class="px-6 py-5 font-bold text-slate-400">1</td>

                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M11.99 5V1h-1v4H7.58L5.6 4.04 4.95 4.6 9 9.07l1.06-1.06 2.86-2.87z"/>
                                </svg>
                            </div>
                            <span class="font-bold">Musik</span>
                        </div>
                    </td>

                    <td class="px-6 py-5 text-slate-600">
                        Acara musik live, konser, dan festival
                    </td>

                    <td class="px-6 py-5 text-center">
                        <span class="px-3 py-1 text-xs font-bold rounded-full
                            bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
                            8 Event
                        </span>
                    </td>

                    <td class="px-6 py-5">
                        <div class="flex justify-end gap-2">
                            <button class="px-3 py-1 text-xs bg-indigo-100 text-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white transition">
                                Edit
                            </button>
                            <button class="px-3 py-1 text-xs bg-red-100 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- ROW 2 -->
                <tr class="bg-gradient-to-r from-blue-50 to-cyan-50 hover:from-blue-100 hover:to-cyan-100 transition">
                    <td class="px-6 py-5 font-bold text-slate-400">2</td>

                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 13H4v6h16v-6z"/>
                                </svg>
                            </div>
                            <span class="font-bold">Seminar</span>
                        </div>
                    </td>

                    <td class="px-6 py-5 text-slate-600">
                        Acara edukatif dan pembelajaran
                    </td>

                    <td class="px-6 py-5 text-center">
                        <span class="px-3 py-1 text-xs font-bold rounded-full
                            bg-gradient-to-r from-green-500 to-emerald-500 text-white">
                            5 Event
                        </span>
                    </td>

                    <td class="px-6 py-5">
                        <div class="flex justify-end gap-2">
                            <button class="px-3 py-1 text-xs bg-indigo-100 text-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white transition">
                                Edit
                            </button>
                            <button class="px-3 py-1 text-xs bg-red-100 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- ROW 3 -->
                <tr class="bg-gradient-to-r from-purple-50 to-fuchsia-50 hover:from-purple-100 hover:to-fuchsia-100 transition">
                    <td class="px-6 py-5 font-bold text-slate-400">3</td>

                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                </svg>
                            </div>
                            <span class="font-bold">Workshop</span>
                        </div>
                    </td>

                    <td class="px-6 py-5 text-slate-600">
                        Pelatihan dan workshop interaktif
                    </td>

                    <td class="px-6 py-5 text-center">
                        <span class="px-3 py-1 text-xs font-bold rounded-full
                            bg-gradient-to-r from-orange-500 to-yellow-500 text-white">
                            3 Event
                        </span>
                    </td>

                    <td class="px-6 py-5">
                        <div class="flex justify-end gap-2">
                            <button class="px-3 py-1 text-xs bg-indigo-100 text-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white transition">
                                Edit
                            </button>
                            <button class="px-3 py-1 text-xs bg-red-100 text-red-600 rounded-md hover:bg-red-600 hover:text-white transition">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection