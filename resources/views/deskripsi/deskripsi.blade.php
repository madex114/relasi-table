@extends('Layouts.Base')

@section('content')
    <div class="container mt-4">
        <!-- Button to add new class data -->
        

        <!-- Card layout for the class table -->
        <div class="card shadow-lg">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Daftar Kelas</h4>
            </div>

            <div class="card-body">
                <!-- Table for displaying class details -->
                <table class="table table-bordered table-hover table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Guru</th>
                            <th>Siswa</th>
                            <th>Kapasitas</th>                          
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelas as $kl)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kl->nama_kelas }}</td>
                                
                                <!-- Display Guru's Name and Expertise -->
                                <td>
                                    {{ optional($kl->guru)->nama_guru ?? 'Tidak ditemukan' }}
                                    @if ($kl->guru && $kl->guru->keahlian)
                                        - {{ $kl->guru->keahlian }}
                                    @endif
                                </td>
                                
                                <!-- Display Student's Name -->
                                <td>{{ optional($kl->siswa)->nama_siswa ?? 'Tidak ditemukan' }}</td>
                                
                                <!-- Display Class Capacity -->
                                <td>{{ $kl->kapasitas }}</td>
                                
                                <!-- Action Buttons (Edit and Delete) -->
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
