<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\supplier;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model produk
        $result = produk::all();
        //dd($result); untuk menampilkan data db

        // kirim data $result ke view produk/index.blade.php
        return view('produk.index')->with('produk', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = supplier::all();
        return view('produk.create')->with('supplier', $suppliers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "nama_produk"  =>"required",
            "jenis"        =>"required",
            "harga"        =>"required",
            "satuan"       =>"required",
            "supplier_id"  =>"required",
        ]);
        //simpan
        produk::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('produk.index')->with('success', $request->nama_produk.' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // edit data
        $suppliers = supplier::all();
        $produk = produk::find($id);
        return view('produk.edit')->with('produk', $produk)->with('suppliers', $suppliers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validasi input nama imput disamakan dengan tabel kolom
        $produk = produk::find($id);
        $input = $request->validate([
            "nama_produk"  =>"required",
            "jenis"        =>"required",
            "harga"        =>"required",
            "satuan"       =>"required",
            "supplier_id"  =>"required",

        ]);
       //update data
       $produk->update($input);

       //redirect beserta pesan sukses
       return redirect()->route('produk.index')->with('success', $request->nama_produk.' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $produk = produk::find($id);

    if (!$produk) {
        return redirect()->route('produk.index')->with('error', 'Data not found.');
    }
    $produk->delete();
    return redirect()->route('produk.index')->with('success', 'Data Produk Berhasil di Hapus');
    }
}
