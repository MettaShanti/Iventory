<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable = ["nama_produk","jenis","harga","satuan","supplier_id"];

    public function supplier()
    {
        return $this->belongsTo(stok::class,'supplier_id','id');
    }
}
