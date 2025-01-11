<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            font-family: 'Roboto', sans-serif;
        }
        .icon-header {
            font-size: 4rem;
            color: #fff;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .form-control, .form-select, .input-group-text {
            border-radius: 10px;
            background-color: #f7f7f7;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #2575fc;
            box-shadow: 0 0 8px rgba(37, 117, 252, 0.5);
        }
        .btn-gradient-primary {
            background: linear-gradient(135deg, #ff7e5f 0%, #feb47b 100%);
            border-color: #ff7e5f;
            color: white;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }
        .btn-gradient-primary:hover {
            background-color: #feb47b;
        }
        .btn-secondary {
            background-color: #f8f9fa;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #e2e6ea;
        }
        .divider {
            width: 60px;
            height: 4px;
            background-color: #2575fc;
            margin: 1rem auto;
            border-radius: 10px;
        }
        label {
            font-weight: 500;
            color: #495057;
        }
        .alert-dismissible .btn-close {
            opacity: 0.8;
        }
        .alert-dismissible .btn-close:hover {
            opacity: 1;
        }
        .container {
            max-width: 900px;
            margin-top: 50px;
        }
        .mb-4 {
            margin-bottom: 30px;
        }
        h1 {
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="text-center">
                        <i class="fas fa-user-circle icon-header"></i>
                        <h2 class="mt-3 text-primary">Tambah Data Siswa</h2>
                        <div class="divider"></div>
                    </div>

                    <form method="POST" action="{{ route('siswa.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        @error('id_kelas')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                        
                        <div class="mb-4">
                            <label for="id_kelas" class="form-label">Kelas</label>
                            <select name="id_kelas" id="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $g)
                                    <option value="{{ $g->id }}" {{ old('id_kelas') == $g->id ? 'selected' : '' }}>{{ $g->bidang_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="nama_siswa" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-gradient-primary px-5 py-3 rounded-pill">
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
