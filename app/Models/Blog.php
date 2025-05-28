<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Daftar field yang bisa diisi (mass assignable)
    protected $fillable = [
        'user_id',
        'title',
        'location',
        'slug',
        'content',
        'image',
        'published_at',
        'status',
        'catatan_admin',
    ];


    // Relasi dengan model User (jika ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
