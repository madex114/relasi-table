<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Menampilkan daftar kelas
    public function index()
    {
        // Ambil semua data kelas
        $kelas = Kelas::all();

        // Kirim data ke view
        return view('kelas.index', compact('kelas'));
    }

    // Menampilkan deskripsi kelas
    public function deskripsi()
    {
        // Ambil semua data kelas
        $kelas = Kelas::all();

        // Kirim data ke view
        return view('deskripsi.deskripsi', compact('kelas'));
    }

    // Menampilkan form untuk membuat kelas baru
    public function create()
    {
        $guru = Guru::all();
        $siswa = Siswa::all();
        return view('kelas.create', compact('guru', 'siswa'));
    }

    // Menyimpan kelas baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_guru' => 'required|exists:guru,id',
            'id_siswa' => 'required|exists:siswa,id',
            'nama_kelas' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
        ]);

        // Simpan kelas baru
        Kelas::create($request->all());

        // Redirect ke halaman daftar kelas
        return redirect()->route('kelas.index');
    }

    // Menampilkan form untuk mengedit kelas
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all();
        $siswa = Siswa::all();
        return view('kelas.edit', compact('kelas', 'guru', 'siswa'));
    }

    // Memperbarui data kelas
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_guru' => 'required|exists:guru,id',
            'id_siswa' => 'required|exists:siswa,id',
            'nama_kelas' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        // Redirect ke halaman daftar kelas
        return redirect()->route('kelas.index');
    }

    // Menghapus kelas
    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();
        return redirect()->route('kelas.index');
    }
}
