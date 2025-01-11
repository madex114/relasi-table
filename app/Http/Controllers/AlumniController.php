<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    // Menampilkan daftar alumni
    public function index()
    {
        $alumni = Alumni::all();
        return view('alumni.index', compact('alumni'));
    }

    // Menampilkan form untuk menambah alumni baru
    public function create()
    {
        return view('alumni.create');
    }

    // Menyimpan data alumni baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'program' => 'required|string|max:255',
            'tahun' => 'required|string|max:4',
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

        // Simpan data alumni
        Alumni::create($data);

        return redirect()->route('alumni.index')->with('success', 'Alumni berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit alumni
    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('alumni.edit', compact('alumni'));
    }

    // Memperbarui data alumni
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'program' => 'required|string|max:255',
            'tahun' => 'required|string|max:4',
            'foto' => 'nullable|image|max:2048', // Validasi foto (opsional, maksimum 2MB)
        ]);

        $alumni = Alumni::findOrFail($id);
        $data = $request->all();

        // Simpan foto baru jika ada dan hapus foto lama
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($alumni->foto && file_exists(public_path('upload/foto/' . $alumni->foto))) {
                unlink(public_path('upload/foto/' . $alumni->foto));
            }

            // Generate nama file unik
            $fileName = time() . '_' . $request->foto->getClientOriginalName();
            // Pindahkan file foto baru ke folder 'uploads/foto' dalam public
            $request->foto->move(public_path('uploads/foto'), $fileName);
            // Simpan nama file foto yang baru ke database
            $data['foto'] = $fileName;
        }

        // Update data alumni
        $alumni->update($data);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui.');
    }

    // Menghapus data alumni
    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);

        // Hapus foto jika ada
        if ($alumni->foto && file_exists(public_path('upload/foto/' . $alumni->foto))) {
            unlink(public_path('upload/foto/' . $alumni->foto));
        }

        // Hapus data alumni
        $alumni->delete();

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil dihapus.');
    }
}
