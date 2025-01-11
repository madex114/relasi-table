<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Menampilkan daftar kelas
    public function index()
    {
        $kelas = Kelas::with('guru')->get(); // Optimalkan query dengan eager loading
        return view('kelas.index', compact('kelas'));
    }

    // Menampilkan form untuk membuat kelas baru
    public function create()
    {
        $guru = Guru::all();
        return view('kelas.create', compact('guru'));
    }

    // Menyimpan kelas baru
    public function store(Request $request)
    {
        $request->validate([
            'id_guru' => 'required|exists:guru,id',
            'bidang_kelas' => 'required|string|max:255',
            'harga' => 'required',
        ]);

        Kelas::create($request->all());
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kelas
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all();
        return view('kelas.edit', compact('kelas', 'guru'));
    }

    // Memperbarui data kelas
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_guru' => 'required|exists:guru,id',
            'bidang_kelas' => 'required|string|max:255',
            'harga' => 'required',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    // Menghapus kelas
    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
