<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kelas', 'nama_siswa', 'email', 'telepon', 'foto'
    ];

    // Define the relationship with the 'Kelas' model
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');  // Update this to belongsTo
    }
}
