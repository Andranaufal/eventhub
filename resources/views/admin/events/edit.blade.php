@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        Menyunting Pengaturan Event
    </h2>

    <form action="{{ route('admin.events.update', $event->id) }}"
          method="POST"
          enctype="multipart/form-data"
          novalidate
          class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">

        @csrf
        @method('PUT')

        <!-- Judul Event -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">
                Judul Event
            </label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $event->title) }}"
                   class="w-full border-2 @error('title') border-red-400 @else border-gray-300 @enderror p-2.5 rounded focus:outline-none focus:ring-2 focus:ring-blue-200"
                   required>
            @error('title')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kategori Event -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">
                Kategori Event
            </label>

            <select name="category_id"
                    class="w-full border border-gray-300 p-2.5 rounded"
                    required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $event->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">
                Deskripsi Pendek
            </label>

            <textarea name="description"
                      rows="3"
                      class="w-full border border-gray-300 p-2.5 rounded"
                      required>{{ $event->description }}</textarea>
        </div>

        <!-- Detail Event -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-4">
            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Tanggal & Waktu
                </label>

                <input type="datetime-local"
                       name="date"
                       value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i') }}"
                       class="w-full border border-gray-300 p-2.5 rounded"
                       required>
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Rencana Harga Masuk (Rp)
                </label>

                <input type="number"
                       name="price"
                       min="0"
                       step="1"
                       value="{{ $event->price }}"
                       title="Harga tiket tidak boleh kurang dari 0"
                       class="w-full border-2 @error('price') border-red-400 @else border-gray-300 @enderror p-2.5 rounded focus:outline-none focus:ring-2 focus:ring-indigo-200"
                       required>
                @error('price')
                    <div class="flex items-center gap-2 bg-red-50 border border-red-300 text-red-700 px-3 py-2 rounded mt-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 5.5H2v9h16v-9zm-2-2H4a2 2 0 00-2 2v11a2 2 0 002 2h12a2 2 0 002-2v-11a2 2 0 00-2-2z" clip-rule="evenodd"/></path></svg>
                        <span class="text-sm font-medium">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Kapasitas Stok Kuota
                </label>

                <input type="number"
                       name="stock"
                       min="1"
                       step="1"
                       value="{{ $event->stock }}"
                       title="Stok tidak boleh kurang dari 1"
                       class="w-full border-2 @error('stock') border-red-400 @else border-gray-300 @enderror p-2.5 rounded focus:outline-none focus:ring-2 focus:ring-indigo-200"
                       required>
                @error('stock')
                    <div class="flex items-center gap-2 bg-red-50 border border-red-300 text-red-700 px-3 py-2 rounded mt-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 5.5H2v9h16v-9zm-2-2H4a2 2 0 00-2 2v11a2 2 0 002 2h12a2 2 0 002-2v-11a2 2 0 00-2-2z" clip-rule="evenodd"/></path></svg>
                        <span class="text-sm font-medium">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        <!-- Lokasi -->
        <div class="mb-6">
            <label class="block mb-2 font-medium text-gray-700">
                Lokasi / Gedung
            </label>

            <input type="text"
                   name="location"
                   value="{{ $event->location }}"
                   class="w-full border border-gray-300 p-2.5 rounded"
                   required>
        </div>

        <!-- Poster -->
        <div class="mb-6">
            <label class="block mb-2 font-medium text-gray-700">
                Poster Event (Opsional)
            </label>

            <input type="file"
                   name="poster"
                   accept="image/*"
                   class="w-full border border-gray-300 p-2.5 rounded">
        </div>

        <!-- Tombol Submit -->
        <div class="flex justify-end border-t pt-4">
            <button type="submit"
                    class="bg-blue-600 text-white px-8 py-2.5 rounded font-semibold hover:bg-blue-700 shadow-md">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection