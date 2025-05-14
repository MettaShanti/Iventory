{{-- copy dari create.blade.php fakultas --}}
@extends('layouts.main')

@section('content')
    <h4>Fakultas</h4>
    <form action="{{ route('user.update', $user['id'])}}" method="post">
    @csrf
    @method('PUT') 
    
    Nama 
    @error('name')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="name" id="" class="form-control mb-2" value="{{ $user['nama']}}">
    
    Email
    @error('email')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="text" name="email" id="" class="form-control mb-2" value="{{ $user['email']}}">

    Password
    @error('password')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="text" name="password" id="" class="form-control mb-2" value="{{ $user['password']}}">

    <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form>
@endsection