<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenyediaTur extends Model
{
    protected $fillable = ['nama', 'slug', 'jenis', 'lokasi', 'alamat', 'nomor', 'email', 'image'];
}
