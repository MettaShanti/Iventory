@extends('layouts.main')

@section('content')
<h4>Tambah Produk</h4>

<form action="{{ route('produk.store') }}" method="POST">
    @csrf

    <label>Nama Produk</label>
    <input type="text" name="nama_produk" class="form-control mb-2">

    <label>Jenis Produk</label>
    <input type="text" name="jenis" class="form-control mb-2" >

    <label>Harga</label>
    <input type="number" name="harga" class="form-control mb-2">

    <label>Satuan</label>
    <input type="text" name="satuan" class="form-control mb-2">

    <label>Supplier</label>
    <select name="supplier_id" class="form-control mb-2">
        <option value="">-- Pilih Supplier --</option>
        @foreach($supplier as $item)
            <option value="{{ $item->id }}" {{ old('supplier_id') == $item->id ? 'selected' : '' }}>
                {{ $item->nama }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-primary mt-2" type="submit">Simpan</button>
</form>
@endsection
