@extends('layouts.base')

@section('content')
    <div class="container">
        <h1>Daftar guru</h1>
        <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm mb-3">Tambah daftar guru</a>
        
        <!-- Table to display teacher information -->
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>No</th>
                    <th>Nama guru</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Keahlian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($guru as $guru)
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>{{ $guru->nama_guru }}</td>
                        <td>{{ $guru->email }}</td>
                        <td>{{ $guru->telepon }}</td>
                        <td>{{ $guru->keahlian }}</td>
                        <td>
                            <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
