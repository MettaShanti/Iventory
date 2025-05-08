@extends('layouts.main')

@section('content')
<form action="{{ route('register.store') }}" method="post">
    @csrf
    Nama
    @error('name')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="name" id="" class="form-control mb-2">
    
    Email 
    @error('email')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="email" id="" class="form-control mb-2">
    
    Password
    @error('password')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="text" name="password" id="" class="form-control mb-2">

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
    {{-- <h4>Fakultas</h4>
    <form action="{{ route('fakultas.store')}}" method="post">
    @csrf
    Nama
    <input type="text" name="nama" id="" class="form-control mb-2">
    Dekan
    <input type="text" name="dekan" id="" class="form-control mb-2">
    Singkatan
    <input type="text" name="singkatan" id="" class="form-control mb-2">

    <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form> --}}
@endsection