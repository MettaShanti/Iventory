@extends('layouts.main')

@section('content')
    <h4>Stok Makanan</h4>
    <a href="{{route('stokbarang.create')}}" class="btn btn-primary">TAMBAH</a>

    <!-- Form Filter Data -->
    <div class="row mt-4">
        <div class="col-md-6">
            <form action="{{ route('stokbarang.filter') }}" method="post" class="form-inline mb-3">
                @csrf
                <div class="input-group">
                    <input type="date" name="tgl_mulai" class="form-control" required>
                    <input type="date" name="tgl_selesai" class="form-control ml-2" required>
                    <button type="submit" class="btn btn-info ml-2">Filter</button>
                </div>
            </form>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>kode barang</th>
                <th>nama barang</th>
                <th>jumlah</th>
                <th>harga jual</th>
                <th>harga pokok</th>
                <th>Tanggal Produksi</th>
                <th>tanggal expired</th>
                <th>kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stokbarang as $row)
            <tr>
                <td>{{ $row['kode_barang']}}</td>
                <td>{{ $row['nama_barang']}}</td>
                <td>{{ $row['jumlah']}}</td>
                <td>{{ $row['harga_jual']}}</td>
                <td>{{ $row['harga_pokok']}}</td>
                <td>{{ $row['tgl_masuk']}}</td>
                <td>{{ $row['tgl_expired']}}</td>
                <td>{{ $row['kategori']['nama_kategori']}}</td>
                {{-- untuk membuat btn ubah --}}
                <td><a href="{{ route('stokbarang.edit', $row ['id'] )}}" class="btn btn-xs btn-warning">UBAH</a>
                    {{-- untuk membuat btn hapus --}}
                    <form action="{{ route('stokbarang.destroy', $row['id'])}}" method="post" style="display:inline"> 
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

