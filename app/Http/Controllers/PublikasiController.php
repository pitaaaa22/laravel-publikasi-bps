<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::all();

        return view('publikasi.index', compact('publikasi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor' => ['required', 'string', 'max:10'],
            'judul' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:100'],
            'ukuran_file' => ['required', 'string', 'max:50'],
            'link_download' => ['nullable', 'string'],
            'tanggal_rilis' => ['required', 'date'],
            'sampul' => ['nullable', 'string', 'max:255'],
        ]);

        Publikasi::create($validated);

        return redirect()
            ->route('publikasi.index')
            ->with('success', 'Publikasi berhasil ditambahkan.');
    }
}