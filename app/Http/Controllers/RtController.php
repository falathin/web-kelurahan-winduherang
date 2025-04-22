<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use Illuminate\Http\Request;

class RtController extends Controller
{
    // Menampilkan daftar semua RT
    public function index()
    {
        $rts = Rt::all();  // Ambil semua data RT
        return view('rt.index', compact('rts'));  // Kirim data ke view
    }

    // Menampilkan form untuk menambah RT
    public function create()
    {
        return view('rt.create');  // Tampilkan form input
    }

    // Menyimpan data RT baru
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nama_rt' => 'required|string|max:255',  // Nama RT wajib diisi
            'id_dusun' => 'required|exists:dusun,id',  // ID Dusun wajib ada dan valid
            // 'alamat' => 'required|string|max:500',  // Alamat wajib diisi dan maksimal 500 karakter
        ]);

        // Simpan data RT ke database
        Rt::create($request->all());

        // Redirect ke halaman daftar RT dengan pesan sukses
        return redirect()->route('rt.index')->with('success', 'RT berhasil ditambahkan!');
    }

    // Menampilkan data RT tertentu berdasarkan ID
    public function show($id)
    {
        $rt = Rt::findOrFail($id);  // Cari data RT berdasarkan ID
        return view('rt.show', compact('rt'));  // Kirim data ke view
    }

    // Menampilkan form untuk mengedit data RT
    public function edit($id)
    {
        $rt = Rt::findOrFail($id);  // Ambil data RT berdasarkan ID
        return view('rt.edit', compact('rt'));  // Kirim data ke form edit
    }

    // Mengupdate data RT berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi inputan
        $request->validate([
            'nama_rt' => 'required|string|max:255',  // Nama RT wajib diisi
            'id_dusun' => 'required|exists:dusun,id',  // ID Dusun wajib ada dan valid
            // 'alamat' => 'required|string|max:500',  // Alamat wajib diisi dan maksimal 500 karakter
        ]);

        // Cari RT berdasarkan ID dan update data
        $rt = Rt::findOrFail($id);
        $rt->update($request->all());

        // Redirect ke halaman daftar RT dengan pesan sukses
        return redirect()->route('rt.index')->with('success', 'RT berhasil diperbarui!');
    }

    // Menghapus data RT berdasarkan ID
    public function destroy($id)
    {
        // Cari RT berdasarkan ID dan hapus
        $rt = Rt::findOrFail($id);
        $rt->delete();

        // Redirect ke halaman daftar RT dengan pesan sukses
        return redirect()->route('rt.index')->with('success', 'RT berhasil dihapus!');
    }
}
