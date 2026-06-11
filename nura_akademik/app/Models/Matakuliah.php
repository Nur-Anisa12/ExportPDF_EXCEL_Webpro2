<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    // Ubah dari 'matakuliahs' menjadi 'matakuliah'
    protected $table = 'matakuliah';

    protected $fillable = [
        'nama_matakuliah',
        'sks',
        'id_jurusan'
    ];
}
