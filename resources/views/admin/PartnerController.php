<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = \App\Models\Partner::all();
        return view('admin.partner.index', compact('partner'));
    }
}
