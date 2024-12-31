@extends('Layouts.Base')
@section('content')
<title>Tambah Data Kelas</title>
<div class="container">
    <h1 class="mt-4">Tambah Data Kelas</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
                </div>
                <div class="mb-3">
                    <label for="id_guru" class="form-label">Guru</label>
                    <select class="form-control" id="id_guru" name="id_guru" required>
                        @foreach ($guru as $g)
                            <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_siswa" class="form-label">Siswa</label>
                    <select class="form-control" id="id_siswa" name="id_siswa" required>
                        @foreach ($siswa as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_siswa }} ({{ $s->keahlian }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
                </div>
                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas</label>
                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
