<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        // Mengambil data dengan pagination (5 data per halaman)
        $matakuliah = Matakuliah::paginate(5);

        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('matakuliah.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'sks' => 'required|numeric|min:1|max:6',
            'id_jurusan' => 'required',
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('matakuliah.edit', compact('matakuliah', 'jurusan'));
    }

    // Memproses perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'sks' => 'required|numeric|min:1|max:6',
            'id_jurusan' => 'required',
        ]);

        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil diperbarui!');
    }

    // Menghapus data
    public function destroy($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil dihapus!');
    }

    public function exportCsv()
    {
        $matakuliah = \App\Models\MataKuliah::all();

    $filename = 'data-matakuliah-' . date('d-m-Y') . '.csv';

    $headers = [
        'Content-Type'        => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$filename\"",
        'Pragma'              => 'no-cache',
        'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
        'Expires'             => '0',
    ];

    $callback = function () use ($matakuliah) {
        $file = fopen('php://output', 'w');

        fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($file, ['No', 'Nama Mata Kuliah', 'SKS'], ';');

        foreach ($matakuliah as $index => $item) {
            fputcsv($file, [
                $index + 1,
                $item->nama_matakuliah,
                $item->sks,
            ], ';');
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
    }

    // PRINT PDF
    public function print()
    {
        $matakuliah = Matakuliah::all();

        return view('matakuliah.print', compact('matakuliah'));
    }

    // PRINT EXCEL
    public function exportExcel()
    {
        $matakuliah = Matakuliah::all();

        return response()
            ->view('matakuliah.excel', compact('matakuliah'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename=matakuliah.xls');
    }
}
