@extends('Layouts.Base')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    
</head>
<body>
    <div class="container mt-1">
        <h1 class="mb-4">Daftar Siswa</h1>

        <!-- Tambahkan tombol untuk menambahkan siswa baru -->
        <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Siswa</a>

        <!-- Tabel Data Siswa -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($siswa as $siswa)
                    <tr>
                        <td>{{ $no ++ }}</td>
                        <td>{{ $siswa->nama_siswa }}</td>
                        <td>{{ $siswa->email }}</td>
                        <td>{{ $siswa->telepon }}</td>
                        <td>
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection