@extends('Layouts.Base')
@section('content')
<title>Tambah Data Siswa</title>
<div class="container">
    <h1 class="mt-4">Tambah Data Siswa</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('siswa.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                </div>
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary btn-sm me-2">Simpan Data</button>
                    <a href="{{ route('siswa.index') }}" class="btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
