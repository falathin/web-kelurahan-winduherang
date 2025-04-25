<?php

namespace App\Http\Controllers;

use App\Models\Hamlet;
use Illuminate\Http\Request;

class HamletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dusuns = Hamlet::latest()->get();  // Ambil semua data dusun
        return view('admin.content.hamlet.index', compact('dusuns'));  // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.hamlet.create');  // Tampilkan form input
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nama_dusun' => 'required|string|max:255',  // Nama dusun wajib diisi
            // 'alamat' => 'required|string|max:500',  // Alamat wajib diisi dan maksimal 500 karakter
        ]);

        // Simpan data dusun ke database
        Hamlet::create($request->all());

        // Redirect ke halaman daftar dusun dengan pesan sukses
        return redirect()->route('dusun.index')->with('success', 'Dusun berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dusun = Hamlet::findOrFail($id);  // Ambil data dusun berdasarkan ID
        return view('admin.content.hamlet.show', compact('dusun'));  // Kirim data ke view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dusun = Hamlet::findOrFail($id);  // Ambil data dusun berdasarkan ID
        return view('admin.content.hamlet.edit', compact('dusun'));  // Tampilkan form edit dengan data dusun
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi inputan
        $request->validate([
            'nama_dusun' => 'required|string|max:255',  // Nama dusun wajib diisi
            // 'alamat' => 'required|string|max:500',  // Alamat wajib diisi dan maksimal 500 karakter
        ]);

        // Cari dusun berdasarkan ID dan update data
        $dusun = Hamlet::findOrFail($id);
        $dusun->update($request->all());

        // Redirect ke halaman daftar dusun dengan pesan sukses
        return redirect()->route('dusun.index')->with('success', 'Dusun berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari dusun berdasarkan ID dan hapus
        $dusun = Hamlet::findOrFail($id);
        $dusun->delete();

        // Redirect ke halaman daftar dusun dengan pesan sukses
        return redirect()->route('dusun.index')->with('success', 'Dusun berhasil dihapus!');
    }
}
