@extends('layouts.main')

@section('content')
<h4>Produk Masuk</h4>

<form action="{{ isset($produkMasuk) ? route('produkMasuk.update', $produkMasuk->id) : route('produkMasuk.store') }}" method="POST">
    @csrf
    @if(isset($produkMasuk))
        @method('PUT')
    @endif

    <label>Kode Produk</label>
    @error('produk_id')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <select id="kode_produk" name="produk_id" class="form-control mb-2">
        <option value="">-- Pilih Kode Produk --</option>
        @foreach ($produk as $item)
            <option value="{{ $item->id }}"
                data-nama="{{ $item->nama_produk }}"
                {{ (isset($produkMasuk) && $item->id == $produkMasuk->produk_id) ? 'selected' : '' }}>
                {{ $item->kode_produk }}
            </option>
        @endforeach
    </select>

    <label>Nama Produk</label>
    <input type="text" id="nama_produk" class="form-control mb-2" value="{{ isset($produkMasuk) ? $produkMasuk->nama_produk : '' }}" readonly>

    <label>Tanggal Masuk</label>
    @error('tgl_masuk')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_masuk" class="form-control mb-2" value="{{ isset($produkMasuk) ? $produkMasuk->tgl_masuk : '' }}">

    <label>Tanggal Produksi</label>
    @error('tgl_produksi')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_produksi" class="form-control mb-2" value="{{ isset($produkMasuk) ? $produkMasuk->tgl_produksi : '' }}">

    <label>Tanggal Expired</label>
    @error('tgl_exp')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_exp" class="form-control mb-2" value="{{ isset($produkMasuk) ? $produkMasuk->tgl_exp : '' }}">

    <label>Jumlah</label>
    @error('jumlah')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="number" name="jumlah" class="form-control mb-2" value="{{ isset($produkMasuk) ? $produkMasuk->jumlah : '' }}">

</form>

@endsection
