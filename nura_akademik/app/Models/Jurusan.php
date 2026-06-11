<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    // Mengacu pada nama tabel di database kamu (berdasarkan gambar tadi)
    protected $table = 'jurusan';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama_jurusan', 
        'akreditasi'
    ];
}