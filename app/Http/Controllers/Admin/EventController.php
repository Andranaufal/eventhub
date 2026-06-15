<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $events = Event::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'category_id' => 'required|exists:categories,id',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'date' => 'required|date',
                'location' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|numeric|min:1',
                'poster' => 'nullable|image|max:2048' // Maksimal 2MB
            ],
            [
                'title.required' => 'Judul event wajib diisi',
                'title.string' => 'Judul event harus berupa teks',
                'title.max' => 'Judul event tidak boleh lebih dari 255 karakter',
                'price.required' => 'Harga tiket wajib diisi',
                'price.numeric' => 'Harga tiket harus berupa angka',
                'price.min' => 'Harga tiket tidak boleh kurang dari 0',
                'stock.required' => 'Stok wajib diisi',
                'stock.numeric' => 'Stok harus berupa angka',
                'stock.min' => 'Stok tidak boleh kurang dari 1',
            ]
        );

        // upload poster (kalau ada)
        if ($request->hasFile('poster')) {
            $data['poster_path'] = $request->file('poster')->store('posters', 'public');
        }

        \App\Models\Event::create($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate(
            [
                'category_id' => 'required|exists:categories,id',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'date' => 'required|date',
                'location' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|numeric|min:1',
                'poster' => 'nullable|image|max:2048'
            ],
            [
                'title.required' => 'Judul event wajib diisi',
                'title.string' => 'Judul event harus berupa teks',
                'title.max' => 'Judul event tidak boleh lebih dari 255 karakter',
                'price.required' => 'Harga tiket wajib diisi',
                'price.numeric' => 'Harga tiket harus berupa angka',
                'price.min' => 'Harga tiket tidak boleh kurang dari 0',
                'stock.required' => 'Stok wajib diisi',
                'stock.numeric' => 'Stok harus berupa angka',
                'stock.min' => 'Stok tidak boleh kurang dari 1',
            ]
        );

        // update poster (kalau ada)
        if ($request->hasFile('poster')) {
            if ($event->poster_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($event->poster_path);
            }
            $data['poster_path'] = $request->file('poster')->store('posters', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus!');
    }
}