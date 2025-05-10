<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\produkKeluar;
use App\Models\produkMasuk;
use App\Models\stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model stok
        $result = stok::all();
        //dd($result); untuk menampilkan data db

        // kirim data $result ke view stok/index.blade.php
        return view('stok.index')->with('stok', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = produk::all();
        $produkMasuk = produkMasuk::all();
        $produkKeluar = produkKeluar::all();
        return view('stok.create')->with('produk', $produk)
                                    ->with('produkMasuk', $produkMasuk)
                                    ->with('produkKeluar', $produkKeluar);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "nama_produk"      =>"required",
            "tgl_produksi"     =>"required",
            "tgl_exp"          =>"required",
            "harga"            =>"required",
            "stok"             =>"required",
            "satuan"           =>"required",
            "produk_id"        =>"required",
            "produkmasuk_id"   =>"required",
            "produkkeluar_id"  =>"required"
            
        ]);

        //simpan
        stok::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('stok.index')->with('success', $request->nama_produk.' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok $id)
    {
        // edit data
        $stok = stok::find($id);
        $produk = produk::all();
        $produkMasuk = produkMasuk::all();
        $produkKeluar = produkKeluar::all();
        return view('stok.edit')->with('stok', $stok)
                                ->with('produk', $produk)
                                ->with('produkMasuk', $produkMasuk)
                                ->with('produkKeluar', $produkKeluar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, stok $id)
    {
        $stok = stok::find($id);
        $input = $request->validate([
           
            "nama_produk"      =>"required",
            "tgl_produksi"     =>"required",
            "tgl_exp"          =>"required",
            "harga"            =>"required",
            "stok"             =>"required",
            "satuan"           =>"required",
            "produk_id"        =>"required",
            "produkmasuk_id"   =>"required",
            "produkkeluar_id"  =>"required"

        ]);
        //update
        $stok->update($input);

        //redirect beserta pesan sukses
        return redirect()->route('stok.index')->with('success', $request->nama_produk.' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stok $id)
    {
        $stok = stok::find($id);

    if (!$stok) {
        return redirect()->route('stok.index')->with('error', 'Data not found.');
    }
    $stok->delete();
    return redirect()->route('stok.index')->with('success', 'Data Stok Berhasil di Hapus');
    }
}
