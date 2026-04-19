@extends('layouts.admin')

@section('content')

<!-- Header -->
<header class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-extrabold text-slate-800">Admin</h1>
        <p class="text-sm text-slate-500">Selamat datang kembali, Admin!</p>
    </div>

    <div class="flex items-center gap-4">
        <div class="text-right text-sm">
            <p class="font-semibold">Admin</p>
            <p class="text-slate-400">Super Admin</p>
        </div>
        <img src="https://ui-avatars.com/api/?name=Admin&background=6366f1&color=fff"
            class="w-11 h-11 rounded-full shadow">
    </div>
</header>

<!-- Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    <div class="bg-gradient-to-r from-indigo-500 to-indigo-400 text-white p-5 rounded-xl shadow">
        <p class="text-sm opacity-80">Pendapatan</p>
        <h2 class="text-2xl font-bold mt-1">Rp 12.450.000</h2>
    </div>

    <div class="bg-gradient-to-r from-green-500 to-green-400 text-white p-5 rounded-xl shadow">
        <p class="text-sm opacity-80">Tiket Terjual</p>
        <h2 class="text-2xl font-bold mt-1">1.284</h2>
    </div>

    <div class="bg-gradient-to-r from-orange-500 to-orange-400 text-white p-5 rounded-xl shadow">
        <p class="text-sm opacity-80">Event Aktif</p>
        <h2 class="text-2xl font-bold mt-1">8 Event</h2>
    </div>

    <div class="bg-gradient-to-r from-red-500 to-red-400 text-white p-5 rounded-xl shadow">
        <p class="text-sm opacity-80">Pending</p>
        <h2 class="text-2xl font-bold mt-1">12</h2>
    </div>

</div>

<!-- Transaksi -->
<div class="bg-white p-6 rounded-2xl shadow border">

    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-bold text-slate-700">Transaksi Terakhir</h3>
        <button class="text-sm bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">
            Lihat Semua
        </button>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left border-collapse">

            <!-- HEADER -->
            <thead>
                <tr class="bg-gradient-to-r from-slate-100 to-slate-50 text-slate-600 uppercase text-xs">
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Event</th>
                    <th class="px-6 py-3 text-center">Status</th>
                    <th class="px-6 py-3 text-right">Harga</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody class="divide-y">

                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 font-semibold">Donni Prabowo</td>
                    <td class="px-6 py-4 text-slate-500">Jazz Night</td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-600 font-semibold">
                            Success
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right font-bold text-indigo-600">
                        Rp 155.000
                    </td>
                </tr>

                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 font-semibold">Maya Sari</td>
                    <td class="px-6 py-4 text-slate-500">AI Workshop</td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-600 font-semibold">
                            Pending
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right font-bold text-indigo-600">
                        Rp 55.000
                    </td>
                </tr>

                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 font-semibold">Budi Santoso</td>
                    <td class="px-6 py-4 text-slate-500">Hackathon</td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 text-xs rounded-full bg-gray-200 text-gray-600 font-semibold">
                            Free
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right font-bold text-indigo-600">
                        Rp 0
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

@endsection