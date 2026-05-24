@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-4xl mx-auto">

    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-800">
            Tambah Kategori
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            Tambahkan kategori event baru
        </p>
    </div>

    <form action="{{ route('admin.categories.store') }}"
        method="POST"
        class="bg-white p-8 rounded-2xl shadow border">

        @csrf

        <!-- NAMA -->
        <div class="mb-6">
            <label class="block mb-2 font-semibold text-slate-700">
                Nama Kategori
            </label>

            <input type="text"
                name="name"
                class="w-full border border-slate-300 px-4 py-3 rounded-xl
                focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                placeholder="Contoh: Seminar"
                required>
        </div>

        <!-- DESKRIPSI -->
        <div class="mb-6">
            <label class="block mb-2 font-semibold text-slate-700">
                Deskripsi
            </label>

            <textarea name="description"
                rows="4"
                class="w-full border border-slate-300 px-4 py-3 rounded-xl
                focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                placeholder="Deskripsi kategori"></textarea>
        </div>

        <!-- STATUS -->
        <div class="mb-6">
            <label class="block mb-2 font-semibold text-slate-700">
                Status
            </label>

            <select name="status"
                class="w-full border border-slate-300 px-4 py-3 rounded-xl
                focus:ring-2 focus:ring-indigo-400 focus:outline-none">

                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>

            </select>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 border-t pt-5">

            <a href="{{ route('admin.categories.index') }}"
                class="px-6 py-3 border rounded-xl text-slate-600 hover:bg-slate-100 transition">
                Batal
            </a>

            <button type="submit"
                class="px-8 py-3 rounded-xl text-white font-semibold
                bg-gradient-to-r from-indigo-500 to-purple-600
                hover:opacity-90 transition shadow-md">

                Simpan
            </button>

        </div>

    </form>

</div>

@endsection