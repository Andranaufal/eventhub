@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-7xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8">

        <!-- Admin -->
        <div class="mb-6">
            <h1 class="text-3xl font-extrabold text-slate-800">
                Admin
            </h1>

            <p class="text-sm text-slate-500">
                Selamat datang kembali, Admin!
            </p>
        </div>

        <!-- Title + Button -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                <h2 class="text-3xl font-black text-slate-800">
                    Daftar Partner
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Kelola seluruh partner kerjasama dengan tampilan modern
                </p>
            </div>

            <a href="{{ route('admin.partners.create') }}"
                class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-2xl
                bg-gradient-to-r from-indigo-500 to-purple-600
                text-white font-semibold shadow-lg hover:scale-105
                transition duration-300">

                + Tambah Partner
            </a>

        </div>

    </div>

    <!-- CARD TABLE -->
    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">

        <!-- TOP BAR -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between
            gap-4 p-6 border-b border-slate-200 bg-slate-50">

            <div>
                <h3 class="font-bold text-slate-700 text-lg">
                    Data Partner Kerjasama
                </h3>

                <p class="text-sm text-slate-500">
                    Total partner: {{ $partners->count() }}
                </p>
            </div>

            @if(session('success'))
                <div class="mt-4 md:mt-0 px-4 py-3 rounded-2xl bg-green-50 border border-green-200 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <!-- SEARCH -->
            <form method="GET" action="{{ route('admin.partners.index') }}" class="relative w-full md:w-72">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari partner..."
                    class="w-full pl-11 pr-4 py-3 rounded-2xl
                    border border-slate-300 focus:ring-2
                    focus:ring-indigo-400 focus:outline-none">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 absolute left-4 top-3.5 text-slate-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35m1.85-5.15
                        a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </form>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <!-- HEAD -->
                <thead class="bg-slate-100 text-slate-700 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-4 font-bold">ID</th>
                        <th class="px-6 py-4 font-bold">Logo</th>
                        <th class="px-6 py-4 font-bold">Nama Partner</th>
                        <th class="px-6 py-4 font-bold text-center">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="space-y-4">

                    @forelse($partners as $partner)

                    @php
                        $bg = 'from-indigo-50 via-purple-50 to-pink-50';
                        $hover = 'hover:from-indigo-100 hover:via-purple-100 hover:to-pink-100';
                    @endphp

                    <tr class="bg-gradient-to-r {{ $bg }}
                        {{ $hover }}
                        transition duration-300">

                        <!-- ID -->
                        <td class="px-6 py-5 font-semibold text-slate-600 rounded-l-2xl">
                            #{{ $partner->id }}
                        </td>

                        <!-- LOGO -->
                        <td class="px-6 py-5">
                            <div class="w-20 h-20 rounded-2xl bg-white shadow-sm
                                border border-slate-200 flex items-center justify-center overflow-hidden">

                                <img 
                                    src="{{ $partner->logo_url }}"
                                    alt="{{ $partner->name }}"
                                    class="max-h-16 object-contain"
                                >
                            </div>
                        </td>

                        <!-- NAMA -->
                        <td class="px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-2xl
                                    bg-gradient-to-r from-indigo-500 to-purple-500
                                    flex items-center justify-center
                                    text-white font-bold shadow-md">

                                    {{ strtoupper(substr($partner->name, 0, 1)) }}
                                </div>

                                <div>
                                    <h4 class="font-bold text-slate-800">
                                        {{ $partner->name }}
                                    </h4>

                                    <p class="text-sm text-slate-400">
                                        Partner Kerjasama
                                    </p>
                                </div>

                            </div>

                        </td>

                        <!-- AKSI -->
                        <td class="px-6 py-5 rounded-r-2xl">

                            <div class="flex items-center justify-center gap-3">

                                <!-- EDIT -->
                                <a href="{{ route('admin.partners.edit', $partner->id) }}"
                                    class="px-4 py-2 rounded-xl
                                    bg-indigo-100 text-indigo-700
                                    hover:bg-indigo-600 hover:text-white
                                    transition font-semibold">

                                    Edit
                                </a>

                                <!-- DELETE -->
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus partner ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="px-4 py-2 rounded-xl
                                        bg-rose-100 text-rose-700
                                        hover:bg-rose-600 hover:text-white
                                        transition font-semibold">

                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">

                            <div class="flex flex-col items-center">

                                <div class="w-20 h-20 rounded-full
                                    bg-slate-100 flex items-center
                                    justify-center mb-4 text-3xl">
                                    🤝
                                </div>

                                <h3 class="font-bold text-slate-700 text-lg">
                                    Belum Ada Partner
                                </h3>

                                <p class="text-slate-500 text-sm mt-1">
                                    Tambahkan partner baru untuk mulai bekerja sama
                                </p>

                            </div>

                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection