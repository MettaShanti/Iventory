@extends('layouts.main')

@section('content')
    <h4>Fakultas</h4>
    <a href="{{route('fakultas.create')}}" class="btn btn-primary">TAMBAH</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Fakultas</th>
                <th>Nama Dekan</th>
                <th>Singkatan</th>
                <th>Ubah Data</th>
                {{-- <th>Hapus Data</th> --}}

            </tr>
        </thead>
        <tbody>
            @foreach ($fakultas as $row)
            <tr>
                <td>{{ $row['nama']}}</td>
                <td>{{ $row['dekan']}}</td>
                <td>{{ $row['singkatan']}}</td>
                {{-- untuk membuat btn ubah --}}
                <td><a href="{{ route('fakultas.edit', $row ['id'] )}}" class="btn btn-xs btn-warning">UBAH</a>
                    {{-- untuk membuat btn hapus --}}
                    <form action="{{ route('fakultas.destroy', $row['id'])}}" method="post" style="display:inline"> 
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

