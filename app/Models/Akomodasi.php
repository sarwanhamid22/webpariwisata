<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akomodasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'slug',
        'alamat',
        'lokasi',
        'harga_mulai',
        'kontak',
    ];

    // Relasi: Akomodasi punya banyak gambar
    public function images()
    {
        return $this->hasMany(AkomodasiImage::class);
    }
}
