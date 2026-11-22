<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBukuRequest;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::orderBy('judul')->paginate(3);
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        Buku::create($request->validated());
        return redirect()->route('buku.index')
            ->with('sukses', 'Data buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'kode_buku' => 'required|string|max:20|unique:bukus,kode_buku,' . $buku->id,
            'judul'     => 'required|string|min:3|max:150',
            'penulis'   => 'required|string|max:100',
            'stok'      => 'required|integer|min:0',
            'kategori'  => 'required|string|max:50',
        ], [
            'kode_buku.unique' => 'Kode buku sudah terdaftar.',
            'judul.min'        => 'Judul minimal 3 karakter.',
        ]);

        $buku->update($request->all());
        return redirect()->route('buku.index')->with('sukses', 'Data buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')
            ->with('sukses', 'Data buku berhasil dihapus.');
    }
}