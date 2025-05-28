<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index');
    }

    public function kirim(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'pesan' => 'required|string|max:1000',
        ]);

        // Kirim ke email admin (ganti email tujuan di bawah)
        Mail::raw("Pesan dari: {$request->nama}\nEmail: {$request->email}\n\n{$request->pesan}", function ($message) use ($request) {
            $message->to('21102115@ittelkom-pwt.ac.id')
                ->subject('Pesan dari Form Kontak Wakatobi')
                ->replyTo($request->email);
        });

        return back()->with('success', 'Pesan kamu berhasil dikirim!');
    }
}
