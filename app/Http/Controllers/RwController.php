<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rws = Rw::latest()->get();  // Ambil semua data RW
        return view('rw.index', compact('rws'));  // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rw.create');  // Tampilkan form input
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nama_rw' => 'required|string|max:255',  // Nama RW wajib diisi
            'id_dusun' => 'required|exists:dusun,id',  // ID Dusun wajib ada dan valid
            // 'alamat' => 'required|string|max:500',  // Alamat wajib diisi dan maksimal 500 karakter
        ]);

        // Simpan data RW ke database
        Rw::create($request->all());

        // Redirect ke halaman daftar RW dengan pesan sukses
        return redirect()->route('rw.index')->with('success', 'RW berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rw = Rw::findOrFail($id);  // Cari data RW berdasarkan ID
        return view('rw.show', compact('rw'));  // Kirim data ke view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rw = Rw::findOrFail($id);  // Cari data RW berdasarkan ID
        return view('rw.edit', compact('rw'));  // Tampilkan form edit dengan data RW
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi inputan
        $request->validate([
            'nama_rw' => 'required|string|max:255',  // Nama RW wajib diisi
            'id_dusun' => 'required|exists:dusun,id',  // ID Dusun wajib ada dan valid
            // 'alamat' => 'required|string|max:500',  // Alamat wajib diisi dan maksimal 500 karakter
        ]);

        // Cari RW berdasarkan ID dan update data
        $rw = Rw::findOrFail($id);
        $rw->update($request->all());

        // Redirect ke halaman daftar RW dengan pesan sukses
        return redirect()->route('rw.index')->with('success', 'RW berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari RW berdasarkan ID dan hapus
        $rw = Rw::findOrFail($id);
        $rw->delete();

        // Redirect ke halaman daftar RW dengan pesan sukses
        return redirect()->route('rw.index')->with('success', 'RW berhasil dihapus!');
    }
}
