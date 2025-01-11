@extends('layouts.base')

@section('content')
    <div class="container">
        <h1>Edit guru</h1>

        <!-- Form to edit teacher information -->
        <form action="{{ route('guru.update', $guru->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_guru">Nama guru</label>
                <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $guru->email }}" required>
            </div>

            <div class="form-group">
                <label for="telepon">No HP</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $guru->telepon }}" required>
            </div>

            <div class="form-group">
    <label for="keahlian">Keahlian</label>
    <select class="form-control" id="keahlian" name="keahlian" required>
        <option value="" disabled {{ empty($guru->keahlian) ? 'selected' : '' }}>Pilih Keahlian</option>
        <option value="Word" {{ $guru->keahlian == 'Word' ? 'selected' : '' }}>Word</option>
        <option value="Excel" {{ $guru->keahlian == 'Excel' ? 'selected' : '' }}>Excel</option>
        <option value="RPL" {{ $guru->keahlian == 'RPL' ? 'selected' : '' }}>RPL</option>
        <option value="TKJ" {{ $guru->keahlian == 'TKJ' ? 'selected' : '' }}>TKJ</option>       
    </select>
</div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-sm">Edit Guru</button>
                <a href="{{ route('guru.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>           
        </form>
    </div>
@endsection
