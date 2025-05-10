@extends('layouts.main')

@section('content')
<h4>Produk Masuk</h4>

<form action="{{ isset($produkMasuk) ? route('produkMasuk.update', $produkMasuk->id) : route('produkMasuk.store') }}" method="POST">
    @csrf
    @if(isset($produkMasuk))
        @method('PUT')
    @endif

    <label>Nama Produk</label>
    @error('produk_id')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <select name="produk_id" class="form-control mb-2">
        <option value="">-- Pilih Produk --</option>
        @foreach ($produk as $item)
            <option value="{{ $item->id }}"
                {{ (isset($produkMasuk) && $item->id == $produkMasuk->produk_id) ? 'selected' : '' }}>
                {{ $item->nama_produk }}
            </option>
        @endforeach
    </select>

    <label>Tanggal Masuk</label>
    @error('tgl_masuk')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_masuk" class="form-control mb-2">

    <label>Tanggal Produksi</label>
    @error('tgl_produksi')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_produksi" class="form-control mb-2">

    <label>Tanggal Expired</label>
    @error('tgl_exp')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_exp" class="form-control mb-2">

    <label>Jumlah</label>
    @error('jumlah')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="number" name="jumlah" class="form-control mb-2">

    <button type="submit" class="btn btn-primary mt-3">
        {{ isset($produkMasuk) ? 'Update' : 'Simpan' }}
    </button>
</form>

@endsection
