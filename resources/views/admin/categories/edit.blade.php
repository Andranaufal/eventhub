@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-4xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8">
        <h2 class="text-3xl font-black text-slate-800">
            Menyunting Kategori
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Ubah informasi kategori event dengan mudah
        </p>
    </div>

    <!-- FORM -->
    <form action="{{ route('admin.categories.update', $category->id) }}"
        method="POST"
        class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">

        @csrf
        @method('PUT')

        <!-- NAMA KATEGORI -->
        <div class="mb-6">
            <label class="block mb-2 font-semibold text-slate-700">
                Nama Kategori
            </label>

            <input type="text"
                name="name"
                value="{{ $category->name }}"
                placeholder="Masukkan nama kategori"
                class="w-full border border-slate-300 px-4 py-3 rounded-xl
                focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                required>
        </div>

        <!-- DESKRIPSI -->
        <div class="mb-6">
            <label class="block mb-2 font-semibold text-slate-700">
                Deskripsi Kategori
            </label>

            <textarea name="description"
                rows="4"
                placeholder="Contoh: Kategori event seminar teknologi dan edukasi"
                class="w-full border border-slate-300 px-4 py-3 rounded-xl
                focus:ring-2 focus:ring-indigo-400 focus:outline-none">{{ $category->description }}</textarea>
        </div>

        <!-- STATUS -->
        <div class="mb-6">
            <label class="block mb-2 font-semibold text-slate-700">
                Status Kategori
            </label>

            <select name="status"
                class="w-full border border-slate-300 px-4 py-3 rounded-xl
                focus:ring-2 focus:ring-indigo-400 focus:outline-none">

                <option value="aktif"
                    {{ $category->status == 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="nonaktif"
                    {{ $category->status == 'nonaktif' ? 'selected' : '' }}>
                    Nonaktif
                </option>

            </select>
        </div>

        <!-- TOMBOL -->
        <div class="flex justify-end gap-3 border-t pt-5">

            <a href="{{ route('admin.categories.index') }}"
                class="px-6 py-3 rounded-xl border border-slate-300
                text-slate-600 hover:bg-slate-100 transition">
                Batal
            </a>

            <button type="submit"
                class="px-8 py-3 rounded-xl text-white font-semibold
                bg-gradient-to-r from-indigo-500 to-purple-600
                hover:opacity-90 shadow-md transition">
                Simpan Perubahan
            </button>

        </div>

    </form>
</div>
@endsection