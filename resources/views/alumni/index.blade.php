@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Daftar Alumni</h1>
    <a href="{{ route('alumni.create') }}" class="btn btn-primary mb-3">Tambah Alumni</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Program</th>
                <th>Tahun</th>
                <th>Foto</th> <!-- Tambahkan kolom Foto -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumni as $index => $alumnus)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $alumnus->nama }}</td>
                <td>{{ $alumnus->no_hp }}</td>
                <td>{{ $alumnus->program }}</td>
                <td>{{ $alumnus->tahun }}</td>
                
                <!-- Tampilkan foto jika ada -->
                <td>
                    @if($alumnus->foto)
                        <img src="{{ asset('upload/foto/' . $alumnus->foto) }}" alt="{{ $alumnus->nama }}" width="100">
                    @else
                        <span>No Foto</span>
                    @endif
                </td>
                
                <td>
                    <a href="{{ route('alumni.edit', $alumnus->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('alumni.destroy', $alumnus->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
