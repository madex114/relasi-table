<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Menampilkan daftar siswa
    public function index()
    {
        $siswa = Siswa::with('kelas')->get(); // Eager load the 'kelas' relationship
        return view('siswa.index', compact('siswa'));
    }

    // Menampilkan form untuk tambah siswa
    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    // Menyimpan data siswa baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'email' => 'required|email|unique:siswas,email', // Pastikan email unik
            'telepon' => 'required|string|max:15',
            'foto' => 'nullable|image|max:2048', // Validasi foto (opsional, maksimum 2MB)
        ]);

        $data = $request->all();

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            // Generate nama file unik
            $fileName = time() . '_' . $request->foto->getClientOriginalName();
            // Pindahkan file foto ke folder 'uploads/foto' dalam public
            $request->foto->move(public_path('upload/foto'), $fileName);
            // Simpan nama file foto ke database
            $data['foto'] = $fileName;
        }

        // Simpan data siswa
        Siswa::create($data);

        // Redirect ke halaman daftar siswa
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    // Menampilkan form untuk edit siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    // Memperbarui data siswa
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'email' => 'required|email|unique:siswas,email,' . $id, // Memastikan email yang sama boleh digunakan
            'telepon' => 'required|string|max:15',
            'foto' => 'nullable|image|max:2048', // Validasi foto (opsional, maksimum 2MB)
        ]);

        $siswa = Siswa::findOrFail($id);
        $data = $request->all();

        // Simpan foto baru jika ada dan hapus foto lama
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto && file_exists(public_path('upload/foto/' . $siswa->foto))) {
                unlink(public_path('upload/foto/' . $siswa->foto));
            }

            // Generate nama file unik
            $fileName = time() . '_' . $request->foto->getClientOriginalName();
            // Pindahkan file foto baru ke folder 'uploads/foto' dalam public
            $request->foto->move(public_path('upload/foto'), $fileName);
            // Simpan nama file foto yang baru ke database
            $data['foto'] = $fileName;
        }

        // Update data siswa
        $siswa->update($data);

        // Redirect ke halaman daftar siswa
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
    
        // Hapus foto jika ada
        if ($siswa->foto && file_exists(public_path('upload/foto/' . $siswa->foto))) {
            unlink(public_path('upload/foto/' . $siswa->foto));
        }
    
        // Hapus data siswa
        $siswa->delete();
    
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
    
}
