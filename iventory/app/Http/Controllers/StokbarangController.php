<?php

namespace App\Http\Controllers;

use App\Models\stokbarang;
use Illuminate\Http\Request;

class StokbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = stokbarang::all();
        return view('stokbarang.index')->with('stokbarang', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stokbarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
           
            "kode_barang"      =>"required",
            "nama_barang"      =>"required",
            "jumlah"           =>"required",
            "harga_jual"       =>"required",
            "harga_pokok"      =>"required",
            "tgl_masuk"        =>"required",
            "tgl_expired"      =>"required",
            "kategori_id"      =>"required"

        ]);
        //simpan
        stokbarang::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('stokbarang.index')->with('success', $request->nama_barang.' Berhasil Disimpan');
    }

    // filter 
    public function filter(Request $request)
{
    $result = stokbarang::all();
    // dd($request);

    // Validasi input tanggal
    $request->validate([
        'tgl_mulai' => 'required|date',
        'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
    ]);

    // Ambil input tanggal dari request
    $mulai = $request->input('tgl_mulai');
    $selesai = $request->input('tgl_selesai');

    // Ambil data berdasarkan rentang tanggal pada `scan_awal` dan `scan_akhir`
    $stokbarang = stokbarang::whereBetween('tgl_masuk', [$mulai, $selesai])
                 ->orWhereBetween('tgl_expired', [$mulai, $selesai])
                 ->orderBy('tgl_masuk', 'asc')
                 ->get();

    // Kirim data hasil filter ke view 'laporan.index'
    return view('stokbarang.index', ['stokbarang' => $stokbarang]);
}

    /**
     * Display the specified resource.
     */
    public function show(stokbarang $stokbarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stokbarang $stokbarang)
    {
        //edit data
        $stokbarang = stokbarang::find($stokbarang);
        return view('stokbarang.edit')->with('stokbarang', $stokbarang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $stokbarang)
    {
        $stokbarang = stokbarang::find($stokbarang);
        $input = $request->validate([
           
            "kode_barang"      =>"required",
            "nama_barang"      =>"required",
            "jumlah"           =>"required",
            "harga_jual"       =>"required",
            "harga_pokok"      =>"required",
            "tgl_masuk"        =>"required",
            "tgl_expired"      =>"required",
            "kategori_id"      =>"required"

        ]);
        //update
        $stokbarang->update($input);

        //redirect beserta pesan sukses
        return redirect()->route('stokbarang.index')->with('success', $request->nama_barang.' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stokbarang $stokbarang)
    {
        $stokbarang = stokbarang::find($stokbarang);
        if (!$stokbarang) {
        return redirect()->route('stokbarang.index')->with('error', 'Data not found.');
        }
        $stokbarang->delete();
        return redirect()->route('stokbarang.index')->with('success', 'Data Jabatan Berhasil di Hapus');
    }
}
