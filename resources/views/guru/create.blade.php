@extends('layouts.base')

@section('content')
    <div class="container">
        <h1 class="my-4">Tambah guru baru</h1>

        <!-- Form to add a new teacher -->
        <form action="{{ route('guru.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_guru" class="form-label">Nama Guru</label>
                <input type="text" class="form-control" id="nama_guru" name="nama_guru" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="telepon" class="form-label">No HP</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="mb-3">
    <label for="keahlian" class="form-label">Keahlian</label>
    <select class="form-control" id="keahlian" name="keahlian" required>
        <option value="" disabled selected>Pilih Keahlian</option>
        <option value="Word">Word</option>
        <option value="Excel">Excel</option>
        <option value="RPL">RPL</option>
        <option value="TKJ">TKJ</option>
    </select>
</div>


            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-sm">Tambah Guru</button>
                <a href="{{ route('guru.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
@endsection
