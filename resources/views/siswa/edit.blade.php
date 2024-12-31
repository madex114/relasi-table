@extends('Layouts.Base')
@section('content')
<div class="container px-4">
    <h1 class="mt-4">Update Data Siswa</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $siswa->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $siswa->telepon }}" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
