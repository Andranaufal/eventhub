@extends('layouts.admin')

@section('content')

<header class="flex flex-col gap-6 mb-10">

    <div>
        <h1 class="text-3xl font-extrabold text-slate-800">Admin</h1>
        <p class="text-sm text-slate-500">Selamat datang kembali, Admin!</p>
    </div>

    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-black text-slate-800">Laporan Transaksi</h1>
            <p class="text-sm text-slate-500">Pantau arus kas dan penjualan tiket Anda</p>
        </div>

        <button
            class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl font-bold shadow hover:opacity-90 transition">
            + Tambah Kategori
        </button>
    </div>

</header>
    <!-- Card -->
    <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden">

        <!-- Filter -->
        <div class="px-6 py-5 bg-gradient-to-r from-indigo-50 via-purple-50 to-pink-50 flex flex-wrap gap-4 items-center">

            <input type="text"
                placeholder="Cari Order ID, Nama, atau Email..."
                class="flex-1 px-5 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-400 outline-none">

            <select class="px-4 py-3 rounded-xl border border-slate-200 font-medium">
                <option>Semua Status</option>
                <option>Success</option>
                <option>Pending</option>
                <option>Expired</option>
            </select>

            <select class="px-4 py-3 rounded-xl border border-slate-200 font-medium">
                <option>Bulan Ini</option>
                <option>Bulan Lalu</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left">

                <!-- Head -->
                <thead class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Order ID</th>
                        <th class="px-6 py-4">Detail Pembeli</th>
                        <th class="px-6 py-4">Event</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Total</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y">

                    @forelse($transactions as $transaction)
                        <tr class="hover:bg-indigo-50 transition">
                            <td class="px-6 py-5">
                                <span class="font-mono text-sm font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg">
                                    {{ $transaction->order_id }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <p class="font-semibold text-slate-800">{{ $transaction->customer_name }}</p>
                                <p class="text-xs text-slate-400">{{ $transaction->customer_email }}</p>
                            </td>

                            <td class="px-6 py-5 font-medium text-slate-700">
                                {{ $transaction->event->title ?? '-' }}
                            </td>

                            <td class="px-6 py-5 text-sm text-slate-500">
                                {{ $transaction->created_at->format('d M Y, H:i') }}
                            </td>

                            <td class="px-6 py-5">
                                @if(in_array($transaction->status, ['settlement', 'success']))
                                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-600 ring-1 ring-green-200">
                                        Success
                                    </span>
                                @elseif($transaction->status === 'pending')
                                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-600 ring-1 ring-yellow-200">
                                        Pending
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-600 ring-1 ring-slate-200">
                                        {{ $transaction->status }}
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5 text-right font-bold text-indigo-600">
                                Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                                Belum ada transaksi
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

    <div class="px-6 py-4 border-t">
        {{ $transactions->links() }}
    </div>

</div>

@endsection