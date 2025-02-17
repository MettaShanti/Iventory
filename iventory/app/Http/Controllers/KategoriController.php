<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = kategori::all();
        return view('kategori.index')->with('kategori', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
           
            "pembagian1_id"       =>"required",
            "pembagian1_nama"     =>"required",
            "pembagian1_ket"      =>"required",

        ]);
        //simpan
        kategori::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('kategori.index')->with('success', $request->.' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($kategori)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //edit data
        $kategori = kategori::find($kategori);
        return view('kategori.edit')->with('kategori', $kategori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kategori)
    {
        $kategori = kategori::find($kategori);
        $input = $request->validate([
           
            "pembagian1_id"       =>"required",
            "pembagian1_nama"     =>"required",
            "pembagian1_ket"      =>"required",

        ]);
        //update
        $kategori->update($input);

        //redirect beserta pesan sukses
        return redirect()->route('kategori.index')->with('success', $request->' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        $kategori = kategori::find($kategori);
            if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Data not found.');
            }
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data Jabatan Berhasil di Hapus');
    }
}
