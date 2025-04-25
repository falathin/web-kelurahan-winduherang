<?php

namespace App\Http\Controllers;

use App\Models\FamilyCard;
use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduk = Resident::latest()->get();  // Ambil semua data penduduk
        return view('admin.content.resident.index', compact('penduduk'));  // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kks = FamilyCard::with('residents')->get(); // buat pilih KK
        return view('admin.content.resident.create', compact('kks'));  // Tampilkan form input
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi semua kolom
        $request->validate([
            'nik' => 'required|unique:residents|digits:16',         // NIK wajib unik dan panjang 16 digit
            'nama_lengkap' => 'required|string|max:255',            // Nama lengkap wajib diisi dan maksimal 255 karakter
            'tempat_lahir' => 'required|string|max:255',            // Tempat lahir wajib diisi
            'tanggal_lahir' => 'required|date',                      // Tanggal lahir wajib diisi dan harus format tanggal yang valid
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan', // Jenis kelamin wajib diisi dan pilih antara Laki-laki atau Perempuan
            'agama' => 'required|string|max:50',                     // Agama wajib diisi dan maksimal 50 karakter
            // 'nik_ayah' => 'required|integer',    // NIK Ayah wajib ada dan harus valid
            'shdk' => 'required|string|max:20',                       // SHDK wajib diisi (Status Hubungan Dalam Keluarga)
            // 'nik_ibu' => 'required|integer',     // NIK Ibu wajib ada dan harus valid
            // 'nama_ibu' => 'required|string|max:255',                  // Nama Ibu wajib diisi dan maksimal 255 karakter
            'gol_darah' => 'required|string|in:A,B,AB,O',            // Golongan darah wajib diisi dengan pilihan A, B, AB, atau O
            'status_perkawinan' => 'required|string', // Status perkawinan wajib diisi dengan pilihan yang sesuai
            'pekerjaan' => 'required|string|max:100',                 // Pekerjaan wajib diisi dan maksimal 100 karakter
            'pendidikan' => 'required|string|max:100',                // Pendidikan wajib diisi dan maksimal 100 karakter
            'no_telp' => 'required|string|',    // Nomor telepon wajib diisi dan formatnya sesuai (misal: 08123456789)
        ]);

        // Simpan data ke database
        Resident::create($request->all());

        // Redirect ke halaman daftar penduduk dengan pesan sukses
        return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penduduk = Resident::with(['familyCard', 'father', 'mother'])->findOrFail($id);
        return view('admin.content.resident.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penduduk = Resident::with('familyCard.residents')->findOrFail($id);  // Ambil data penduduk berdasarkan ID
        $kks = FamilyCard::with('residents')->get(); // buat pilih KK
        return view('admin.content.resident.edit', compact('penduduk', 'kks'));  // Tampilkan form edit dengan data penduduk
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi semua kolom, dengan pengecualian untuk NIK (untuk update bisa ada yang sama dengan NIK yang sudah ada)
        $request->validate([
            'nik' => 'required|digits:16',         // NIK wajib unik dan panjang 16 digit
            'nama_lengkap' => 'required|string|max:255',            // Nama lengkap wajib diisi dan maksimal 255 karakter
            'tempat_lahir' => 'required|string|max:255',            // Tempat lahir wajib diisi
            'tanggal_lahir' => 'required|date',                      // Tanggal lahir wajib diisi dan harus format tanggal yang valid
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan', // Jenis kelamin wajib diisi dan pilih antara Laki-laki atau Perempuan
            'agama' => 'required|string|max:50',                     // Agama wajib diisi dan maksimal 50 karakter
            // 'nik_ayah' => 'required|integer',    // NIK Ayah wajib ada dan harus valid
            'shdk' => 'required|string|max:20',                       // SHDK wajib diisi (Status Hubungan Dalam Keluarga)
            // 'nik_ibu' => 'required|integer',     // NIK Ibu wajib ada dan harus valid
            // 'nama_ibu' => 'required|string|max:255',                  // Nama Ibu wajib diisi dan maksimal 255 karakter
            'gol_darah' => 'required|string|in:A,B,AB,O',            // Golongan darah wajib diisi dengan pilihan A, B, AB, atau O
            'status_perkawinan' => 'required|string', // Status perkawinan wajib diisi dengan pilihan yang sesuai
            'pekerjaan' => 'required|string|max:100',                 // Pekerjaan wajib diisi dan maksimal 100 karakter
            'pendidikan' => 'required|string|max:100',                // Pendidikan wajib diisi dan maksimal 100 karakter
            'no_telp' => 'required|string|',    // Nomor telepon wajib diisi dan formatnya sesuai (misal: 08123456789)
        ]);

        // Cari penduduk berdasarkan ID dan update data
        $penduduk = Resident::findOrFail($id);  // Mengambil data penduduk berdasarkan ID
        $penduduk->update($request->all());    // Update data dengan data yang baru

        // Redirect ke halaman daftar penduduk dengan pesan sukses
        return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari penduduk berdasarkan ID dan hapus
        $penduduk = Resident::findOrFail($id);
        $penduduk->delete();

        // Redirect ke halaman daftar penduduk dengan pesan sukses
        return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil dihapus!');
    }
}
