<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stokbarang extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ["kode_barang","nama_barang","jumlah","harga_jual","harga_pokok","tgl_masuk","tgl_expired","kategori_id"];

    public function kategori()
    {
        return $this->belongsTo(kategori::class,'kategori_id','id');
    }
}
