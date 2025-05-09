@extends('layouts.main')

@section('content')
    <h4>Manajemen Users</h4>
    <a href="{{route('register.create')}}" class="btn btn-primary">TAMBAH</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($register as $row)
            <tr>
                <td>{{ $row['name']}}</td>
                <td>{{ $row['email']}}</td>
                <td>{{ $row['password']}}</td>
                {{-- untuk membuat btn ubah --}}
                <td><a href="{{ route('register.edit', $row ['id'] )}}" class="btn btn-xs btn-warning">UBAH</a>
                    {{-- untuk membuat btn hapus --}}
                    <form action="{{ route('register.destroy', $row['id'])}}" method="post" style="display:inline"> 
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin hapus data ini?')">HAPUS</button>
                    </form>
                    {{-- style="display:inline" untuk memindahkan btn ke samping --}}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection

onclick="return confirm('Yakin ingin hapus data ini?')"

