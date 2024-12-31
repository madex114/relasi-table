<?php

namespace App\Http\Controllers;
use App\Models\Guru;

use Illuminate\Http\Request;

class GuruController extends Controller
{
     // Menampilkan daftar dokter
     public function index()
     {
         $guru = Guru::all();
         return view('guru.index', compact('guru'));
     }
 
     // Menampilkan form untuk membuat dokter baru
     public function create()
     {
         return view('guru.create');
     }
 
     // Menyimpan data dokter yang baru
     public function store(Request $request)
     {

         Guru::create($request->all());
 
         return redirect()->route('guru.index');
     }
 
     // Menampilkan form untuk mengedit data dokter
     public function edit($id)
     {
         $guru = Guru::findOrFail($id);
         return view('guru.edit', compact('guru'));
     }
 
     // Memperbarui data dokter
     public function update(Request $request, $id)
     {
 
         $guru = Guru::findOrFail($id);
         $guru->update($request->all());
 
         return redirect()->route('guru.index');
     }
 
     // Menghapus data dokter
     public function destroy($id)
     {
         Guru::findOrFail($id)->delete();
         return redirect()->route('guru.index');
     }
}
