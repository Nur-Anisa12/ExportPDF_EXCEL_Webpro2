<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|unique:jurusan,nama_jurusan',
            'akreditasi' => 'required',
        ]);

        Jurusan::create($request->all());

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan!');
    }

    // Menghapus data
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus!');
    }

    // Menampilkan form edit dengan data lama
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    // Memproses perubahan data ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'unique:jurusans,nama_jurusan,'.$id artinya abaikan pengecekan unik untuk ID ini sendiri
            'nama_jurusan' => 'required|unique:jurusan,nama_jurusan,' . $id,
            'akreditasi' => 'required',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diperbarui!');
    }

    public function exportCsv()
    {
        $fileName = 'jurusan.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () {

            $file = fopen('php://output', 'w');

            // Tambahkan BOM agar karakter UTF-8 terbaca baik di Excel
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // Header kolom
            fputcsv($file, [
                'ID',
                'Nama Jurusan',
                'Akreditasi'
            ], ';');

            $jurusan = Jurusan::all();

            foreach ($jurusan as $item) {

                fputcsv($file, [
                    $item->id,
                    $item->nama_jurusan,
                    $item->akreditasi,
                ], ';'); // delimiter titik koma
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // PRINT PDF
    public function print()
    {
        $jurusan = Jurusan::all();

        return view('jurusan.print', compact('jurusan'));
    }

    // PRINT EXCEL
    public function exportExcel()
    {
        $jurusan = Jurusan::all();

        return response()
            ->view('jurusan.excel', compact('jurusan'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename=jurusan.xls');
    }
}
