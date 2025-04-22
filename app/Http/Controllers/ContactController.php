<?php

namespace App\Http\Controllers;

use App\Mail\NewPengaduanMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $req)
    {
        $data = $req->validate([
            'nama'      => 'required|string',
            'email'     => 'required|email',
            'rw'        => 'required|string',
            'rt'        => 'required|string',
            'waktu'     => 'required|date',
            'lokasi'    => 'required|string',
            'deskripsi' => 'required|string',
            'bukti'     => 'nullable|array|max:5',
            'bukti.*'   => 'image|max:2048',
        ]);

        // simpan file bukti
        if ($req->hasFile('bukti')) {
            $paths = [];
            foreach ($req->file('bukti') as $f) {
                $paths[] = $f->store('pengaduan', 'public');
            }
            $data['bukti'] = $paths;
        }

        // simpan ke DB
        $c = Contact::create($data);

        // kirim email notif ke admin
        Mail::send(new NewPengaduanMail($c));

        return back()->with('success', 'Pengaduan Anda berhasil dikirim.');
    }
}