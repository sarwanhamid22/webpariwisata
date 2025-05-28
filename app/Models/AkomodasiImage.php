<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkomodasiImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'akomodasi_id',
        'image',
    ];

    // Relasi: Gambar punya 1 akomodasi
    public function akomodasi()
    {
        return $this->belongsTo(Akomodasi::class);
    }
}
