@extends('layouts.main')

@section('content')
<h4>Tambah Data Supplier</h4>
<form action="{{ route('supplier.store') }}" method="post">
    @csrf

    <label>Nama</label>
    @error('nama')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="nama" class="form-control mb-2">

    <label>Alamat</label>
    @error('alamat')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="alamat" class="form-control mb-2">

    <label>No HP</label>
    @error('nohp')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="nohp" class="form-control mb-2">

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
