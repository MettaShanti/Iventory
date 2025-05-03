<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produkMasuk extends Model
{
    use HasFactory;
    protected $fillable = ["nama_produk","tgl_masuk","tgl_produksi","tgl_exp","jumlah","produk_id"];

    public function produk()
    {
        return $this->belongsTo(stok::class,'produk_id','id');
    }
}
