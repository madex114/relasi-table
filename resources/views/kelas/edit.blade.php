@extends('Layouts.Base')

@section('content')
<title>Update Data Kelas</title>
<div class="container">
    <h1 class="mt-4">Update Data Kelas</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" 
                        value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
                </div>

                <!-- Pemilihan Guru -->
                <div class="mb-3">
                    <label for="id_guru" class="form-label">Guru</label>
                    <select class="form-control" id="id_guru" name="id_guru" required>
                        @foreach ($guru as $g)
                            <option value="{{ $g->id }}" 
                                @if ($g->id == $kelas->id_guru) selected @endif>
                                {{ $g->nama_guru }} ({{ $g->keahlian }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pemilihan Siswa -->
                <div class="mb-3">
                    <label for="id_siswa" class="form-label">Siswa</label>
                    <select class="form-control" id="id_siswa" name="id_siswa" required>
                        @foreach ($siswa as $s)
                            <option value="{{ $s->id }}" 
                                @if ($s->id == $kelas->id_siswa) selected @endif>
                                {{ $s->nama_siswa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Nama Kelas -->
           

                <!-- Kapasitas -->
                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas</label>
                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" 
                        value="{{ old('kapasitas', $kelas->kapasitas) }}" required>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
    