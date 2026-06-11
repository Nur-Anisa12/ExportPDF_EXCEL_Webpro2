<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah data dari masing-masing tabel
        $totalMahasiswa = Mahasiswa::count();
        $totalJurusan = Jurusan::count();
        $totalMatakuliah = Matakuliah::count();

        // Mengirimkan variabel ke view
        return view('dashboard', compact('totalMahasiswa', 'totalJurusan', 'totalMatakuliah'));
    }
}
