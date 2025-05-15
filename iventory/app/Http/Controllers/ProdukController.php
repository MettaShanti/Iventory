<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\supplier;
use Illuminate\Support\Facades\DB;
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
        $supplier = supplier::all();
        return view('produk.create')->with('supplier', $supplier);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $input = $request->validate([   
        "kode_produk"  => "required",
        "nama_produk"  => "required",
        "jenis"        => "required",
        "harga"        => "required|numeric",
        "satuan"       => "required",
        "supplier_id"  => "required|exists:suppliers,id",
    ]);

    // Gunakan transaction untuk menghindari duplikat kode
    DB::beginTransaction();

    try {
        // Ambil id terakhir yang digunakan (bukan hanya id, tapi urutan berdasarkan kode)
        $lastKode = Produk::orderByDesc('id')->first()?->kode_produk;

        if ($lastKode) {
            $lastNumber = (int) substr($lastKode, 1); // hapus huruf "P"
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $kodeProduk = 'P' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        $input['kode_produk'] = $kodeProduk;

        Produk::create($input);

        DB::commit();

        return redirect()->route('produk.index')->with('success', $request->nama_produk . ' Berhasil Disimpan');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'Gagal menyimpan data produk: ' . $e->getMessage()]);
    }
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
        $produk = produk::find($id);
        $supplier = supplier::all();
        return view('produk.edit')->with('produk', $produk)->with('supplier', $supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validasi input nama imput disamakan dengan tabel kolom
        $produk = produk::find($id);
        $input = $request->validate([
            "kode_produk"  =>"required",
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
