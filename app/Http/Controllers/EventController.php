<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // User Area Methods
    public function show(Event $event)
    {
        // Mengambil daftar kategori untuk keperluan menu navigasi
        $categories = \App\Models\Category::all();

        // Me-render view dengan membawa data kategori dan data spesifik acara tersebut
        return view('event-detail', compact('categories', 'event'));
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function ticket()
    {
        return view('ticket');
    }

    // Admin Area Method
    public function indexAdmin()
    {
        return view('admin.events');
    }
}
