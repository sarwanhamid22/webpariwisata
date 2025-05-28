<?php

namespace App\Http\Controllers;

use App\Models\PenyediaTur;
use Illuminate\Http\Request;

class PenyediaTurController extends Controller
{
    public function index()
    {
        $penyediaTurs = PenyediaTur::latest()->paginate(9);

        return view('penyediatur.index', compact('penyediaTurs'));
    }

    public function show($slug)
    {
        $penyediaTurs = PenyediaTur::where('slug', $slug)->firstOrFail();

        return view('penyediatur.show', compact('penyediaTurs'));
    }
}
