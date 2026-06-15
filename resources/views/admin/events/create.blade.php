@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Form
Tambah Event</h2>

    <form action="{{ route('admin.events.store') }}"
method="POST" enctype="multipart/form-data" novalidate class="bg-white p-6 rounded-lg shadow-sm border
border-gray-200 mt-2">
    @csrf

    <div class="mb-4">
        <label class="block mb-2 font-medium text-gray-700">Judul Event</label>
        <input type="text"
               name="title"
               value="{{ old('title') }}"
               class="w-full border-2 @error('title') border-red-400 @else border-gray-300 @enderror p-2.5 rounded focus:outline-none focus:ring-2 focus:ring-indigo-200"
               required>
        @error('title')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block mb-2 font-medium text-gray-700">Kategori Event</label>
        <select name="category_id" class="w-full border
    border-gray-300 p-2.5 rounded focus:ring focus:ring-indigo200" required>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{
$category->name }}</option>
 @endforeach
 </select>
 </div>
 <div class="mb-4">
 <label class="block mb-2 font-medium text-gray700">Deskripsi Pendek</label>
 <textarea name="description" class="w-full border
border-gray-300 p-2.5 rounded focus:ring focus:ring-indigo200" rows="3" required></textarea>
 </div>
 <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb4">
 <div>
 <label class="block mb-2 font-medium textgray-700">Tanggal & Waktu</label>
 <input type="datetime-local" name="date"
class="w-full border border-gray-300 p-2.5 rounded" required>
 </div>

 <div>
 <label class="block mb-2 font-medium text-gray-700">Harga Tiket (Rp)</label>
 <input type="number" name="price" min="0" step="1" value="{{ old('price') }}" title="Harga tiket tidak boleh kurang dari 0" class="w-full border-2 @error('price') border-red-400 @else border-gray-300 @enderror p-2.5 rounded focus:outline-none focus:ring-2 focus:ring-indigo-200" required>
 @error('price')
 <div class="flex items-center gap-2 bg-red-50 border border-red-300 text-red-700 px-3 py-2 rounded mt-2">
 <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 5.5H2v9h16v-9zm-2-2H4a2 2 0 00-2 2v11a2 2 0 002 2h12a2 2 0 002-2v-11a2 2 0 00-2-2z" clip-rule="evenodd"/></path></svg>
 <span class="text-sm font-medium">{{ $message }}</span>
 </div>
 @enderror
 </div>
 <div>
 <label class="block mb-2 font-medium text-gray-700">Kapasitas Stok</label>
 <input type="number" name="stock" min="1" step="1" value="{{ old('stock') }}" title="Stok tidak boleh kurang dari 1" class="w-full border-2 @error('stock') border-red-400 @else border-gray-300 @enderror p-2.5 rounded focus:outline-none focus:ring-2 focus:ring-indigo-200" required>
 @error('stock')
 <div class="flex items-center gap-2 bg-red-50 border border-red-300 text-red-700 px-3 py-2 rounded mt-2">
 <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 5.5H2v9h16v-9zm-2-2H4a2 2 0 00-2 2v11a2 2 0 002 2h12a2 2 0 002-2v-11a2 2 0 00-2-2z" clip-rule="evenodd"/></path></svg>
 <span class="text-sm font-medium">{{ $message }}</span>
 </div>
 @enderror
 </div>
 </div>
 <div class="mb-6">
 <label class="block mb-2 font-medium text-gray700">Lokasi / Gedung</label>
 <input type="text" name="location" class="w-full
border border-gray-300 p-2.5 rounded" required>
 </div>
 <div class="mb-6">
 <label class="block mb-2 font-medium text-gray-700">Poster Event (Opsional)</label>
 <input type="file" name="poster" accept="image/*" class="w-full border border-gray-300 p-2.5 rounded">
 </div>
 <div class="flex justify-end border-t pt-4">
 <button type="submit" class="bg-indigo-600 textwhite px-8 py-2.5 rounded font-semibold hover:bg-indigo-700
shadow">Simpan Data</button>
 </div>
 </form>
</div>
@endsection