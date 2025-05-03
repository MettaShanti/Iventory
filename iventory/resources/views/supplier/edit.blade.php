@extends('layouts.main')

@section('content')
<h4>Divisi</h4>
<form action="{{ route('pembagian3.update', $pembagian3['pembagian3_id'])}}" method="post">
    @csrf
    @method('PUT')
    Id Divisi
    @error('pembagian3_id')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="number" name="pembagian3_id" id="" class="form-control mb-2" value="{{ $pembagian3['pembagian3_id']}}">
    
    Nama Divisi 
    @error('pembagian3_nama')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="pembagian3_nama" id="" class="form-control mb-2" value="{{ $pembagian3['pembagian3_nama']}}">
    
    Keterangan Divisi
    @error('pembagian3_ket')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="text" name="pembagian3_ket" id="" class="form-control mb-2" value="{{ $pembagian3['pembagian3_ket']}}">

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection
