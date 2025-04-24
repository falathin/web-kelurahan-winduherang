<?php

namespace App\Http\Controllers;

use App\Models\Hamlet;
use App\Models\Rw;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil query search dari request
        $search = $request->input('search');

        // Query dengan filter search pada nomor_rw atau nama dusun
        $rws = Rw::with('hamlet')
            ->when($search, function($q) use ($search) {
                $q->where('nomor_rw', 'like', "%{$search}%")
                  ->orWhereHas('hamlet', fn($q2) =>
                      $q2->where('nama_dusun', 'like', "%{$search}%")
                  );
            })
            ->orderByDesc('created_at')
            ->paginate(10)             // 10 per halaman
            ->withQueryString();       // pertahankan ?search=...

        // Kirim ke view
        return view('admin.content.rw.index', compact('rws', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dusuns = Hamlet::latest()->get();
        return view('admin.content.rw.create', compact('dusuns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_rw' => 'required|string|max:255',
            'id_dusun' => 'required|exists:hamlets,id',
        ]);

        Rw::create($request->only(['nomor_rw','id_dusun']));

        return redirect()->route('rw.index')
                         ->with('success','RW berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rw     = Rw::findOrFail($id);
        $dusuns = Hamlet::latest()->get();
        return view('admin.content.rw.edit', compact('rw','dusuns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomor_rw' => 'required|string|max:255',
            'id_dusun' => 'required|exists:hamlets,id',
        ]);

        $rw = Rw::findOrFail($id);
        $rw->update($request->only(['nomor_rw','id_dusun']));

        return redirect()->route('rw.index')
                         ->with('success','RW berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rw::findOrFail($id)->delete();

        return redirect()->route('rw.index')
                         ->with('success','RW berhasil dihapus!');
    }
}