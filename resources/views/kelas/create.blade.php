@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Tambah Kelas</h1>
    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_guru" class="form-label">Nama Guru</label>
            <select name="id_guru" id="id_guru" class="form-control @error('id_guru') is-invalid @enderror">
                <option value="">Pilih Guru</option>
                @foreach($guru as $g)
                    <option value="{{ $g->id }}" {{ old('id_guru') == $g->id ? 'selected' : '' }}>{{ $g->nama_guru }}</option>
                @endforeach
            </select>
            @error('id_guru')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bidang_kelas" class="form-label">Bidang Kelas</label>
            <input type="text" name="bidang_kelas" id="bidang_kelas" class="form-control @error('bidang_kelas') is-invalid @enderror" value="{{ old('bidang_kelas') }}">
            @error('bidang_kelas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
