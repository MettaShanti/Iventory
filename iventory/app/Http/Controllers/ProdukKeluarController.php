<?php

namespace App\Http\Controllers;

use App\Models\produkKeluar;
use Illuminate\Http\Request;

class ProdukKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model produkKeluar
        $result = produkKeluar::all();
        //dd($result); untuk menampilkan data db

        // kirim data $result ke view produkKeluar/index.blade.php
        return view('produkKeluar.index')->with('produkKeluar', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produkKeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input nama, input disamakan dengan tabel kolom
        $input = $request->validate([
            "nama_produk"   =>"required",
            "tgl_keluar"    =>"required",
            "tgl_exp"       =>"required",
            "jumlah"        =>"required",
            "produk_id"     =>"required",
        ]);
        //simpan
        produkKeluar::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('produkKeluar.index')->with('success', $request->namap_roduk.' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(produkKeluar $produkKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // edit data
        $produkKeluar = produkKeluar::find($id);
        return view('produkKeluar.edit')->with('produkKeluar', $produkKeluar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $produkKeluar = produkKeluar::find($id);
        $input = $request->validate([
            "nama_produk"   =>"required",
            "tgl_keluar"    =>"required",
            "tgl_exp"       =>"required",
            "jumlah"        =>"required",
            "produk_id"     =>"required",

        ]);
        //update
        $produkKeluar->update($input);

        //redirect beserta pesan sukses
        return redirect()->route('produkKeluar.index')->with('success', $request->nama_produk.' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produkKeluar $id)
    {
        $produkKeluar = produkKeluar::find($id);

    if (!$produkKeluar) {
        return redirect()->route('produk.index')->with('error', 'Data not found.');
    }
    $produkKeluar->delete();
    return redirect()->route('produkKeluar.index')->with('success', 'Data Produk Keluar Berhasil di Hapus');
    }
}
