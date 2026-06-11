<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    // 1. Beritahu Laravel Primary Key-nya adalah nim
    protected $primaryKey = 'nim';

    // 2. PENTING: Karena NIM bukan angka yang naik otomatis (auto-increment),
    // kita harus set ke false agar Laravel tidak membuangnya saat proses insert.
    public $incrementing = false;

    // 3. Tipe data NIM di database (string/varchar)
    protected $keyType = 'string';

    // 4. Daftarkan di fillable agar boleh diisi massal
    protected $fillable = [
        'nim',
        'nama',
        'id_jurusan'
    ];

    public function detail_jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
