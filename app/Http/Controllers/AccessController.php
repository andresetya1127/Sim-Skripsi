<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index()
    {
        return view('pages.access_index', ['page_title' => 'Akses Kontrol']);
    }
}
