<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function manageBuku()
    {
        return view('pages.buku.manage_buku', [
            'page_title' => 'Kelola Buku'
        ]);
    }

    public function addBuku()
    {
        return view('pages.buku.add_buku', [
            'page_title' => 'Kelola Buku'
        ]);
    }

    public function saveBuku(Request $request)
    {
        return view('pages.buku.add_buku', [
            'page_title' => 'Kelola Buku'
        ]);
    }
}
