@extends('layouts.main')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Stok</h4>
            <a href="{{ route('stok.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="supplierTable" class="table table-bordered table-striped table-hover nowrap" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stok as $index => $row)
                        <tr>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->nohp }}</td>
                            <td>
                                <a href="{{ route('stok.edit', $row->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                <form action="{{ route('stok.destroy', $row->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        new simpleDatatables.DataTable("#supplierTable");
    </script>
@endsection
