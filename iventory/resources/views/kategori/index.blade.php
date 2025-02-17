@extends('layouts.main')

@section('content')
    <h4>kategori</h4>
    <a href="{{route('kategori.create')}}" class="btn btn-primary">TAMBAH</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>jenis</th>
                <th>deskripsi</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $row)
            <tr>
                <td>{{ $row['nama_kategori']}}</td>
                <td>{{ $row['jenis']}}</td>
                <td>{{ $row['deskripsi']}}</td>
                <td>{{ $row['status']}}</td>
                {{-- untuk membuat btn ubah --}}
                <td><a href="{{ route('kategori.edit', $row ['id'] )}}" class="btn btn-xs btn-warning">UBAH</a>
                    {{-- untuk membuat btn hapus --}}
                    <form action="{{ route('kategori.destroy', $row['id'])}}" method="post" style="display:inline"> 
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-xs btn-danger">HAPUS</button>
                    </form>
                    {{-- style="display:inline" untuk memindahkan btn ke samping --}}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection

