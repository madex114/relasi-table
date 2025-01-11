@extends('Layouts.Base')

@section('content')
<title>Daftar Siswa</title>
<div class="container">
    <h1 class="mt-4">Daftar Siswa</h1>
    <div class="card">
        <div class="card-body">
           
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kelas</th>
                        <th>Nama Siswa</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswa as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->kelas ? $s->kelas->bidang_kelas : 'Kelas tidak ditemukan' }}</td> <!-- Accessing kelas relationship -->
                            <td>{{ $s->nama_siswa }}</td>
                            <td>{{ $s->email }}</td>
                            <td>{{ $s->telepon }}</td>
                            <td>
                                <img src="{{ asset('upload/foto/' . $s->foto) }}" alt="{{ $s->nama_siswa }}" width="100" class="img-thumbnail">
                            </td>
                            <td>                                
                                
                            <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>


                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
