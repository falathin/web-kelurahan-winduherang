<?php

namespace App\Http\Controllers;

use App\Models\FamilyCard;
use Illuminate\Http\Request;

class FamilyCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kartuKeluarga = FamilyCard::latest()->get();  // Ambil semua data kartu keluarga
        return view('kartu_keluarga.index', compact('kartuKeluarga'));  // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kartu_keluarga.create');  // Tampilkan form input
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'no_kk' => 'required|unique:kartu_keluarga,no_kk|digits:16',  // No KK wajib unik dan panjang 16 digit
            'kepala_keluarga' => 'required|string|max:255',                  // Kepala keluarga wajib diisi
            'alamat' => 'required|string|max:500',                            // Alamat wajib diisi dan maksimal 500 karakter
            'id_rt' => 'required|exists:rukun_tetangga,id',                   // ID RT wajib ada dan valid
            'id_rw' => 'required|exists:rukun_warga,id',                      // ID RW wajib ada dan valid
            'id_dusun' => 'required|exists:dusun,id',                         // ID Dusun wajib ada dan valid
        ]);

        // Simpan data kartu keluarga ke database
        FamilyCard::create($request->all());

        // Redirect ke halaman daftar kartu keluarga dengan pesan sukses
        return redirect()->route('kartu_keluarga.index')->with('success', 'Kartu Keluarga berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kartuKeluarga = FamilyCard::findOrFail($id);  // Ambil data kartu keluarga berdasarkan ID
        return view('kartu_keluarga.show', compact('kartuKeluarga'));  // Kirim data ke view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kartuKeluarga = FamilyCard::findOrFail($id);  // Ambil data kartu keluarga berdasarkan ID
        return view('kartu_keluarga.edit', compact('kartuKeluarga'));  // Kirim data ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi inputan
        $request->validate([
            'no_kk' => 'required|digits:16|unique:kartu_keluarga,no_kk,' . $id,  // No KK wajib unik kecuali untuk yang sedang diupdate
            'kepala_keluarga' => 'required|string|max:255',                           // Kepala keluarga wajib diisi
            'alamat' => 'required|string|max:500',                                     // Alamat wajib diisi dan maksimal 500 karakter
            'id_rt' => 'required|exists:rukun_tetangga,id',                            // ID RT wajib ada dan valid
            'id_rw' => 'required|exists:rukun_warga,id',                               // ID RW wajib ada dan valid
            'id_dusun' => 'required|exists:dusun,id',                                  // ID Dusun wajib ada dan valid
        ]);

        // Cari kartu keluarga berdasarkan ID dan update data
        $kartuKeluarga = FamilyCard::findOrFail($id);
        $kartuKeluarga->update($request->all());

        // Redirect ke halaman daftar kartu keluarga dengan pesan sukses
        return redirect()->route('kartu_keluarga.index')->with('success', 'Kartu Keluarga berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari kartu keluarga berdasarkan ID dan hapus
        $kartuKeluarga = FamilyCard::findOrFail($id);
        $kartuKeluarga->delete();

        // Redirect ke halaman daftar kartu keluarga dengan pesan sukses
        return redirect()->route('kartu_keluarga.index')->with('success', 'Kartu Keluarga berhasil dihapus!');
    }
}
