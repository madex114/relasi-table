<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Table name is optional, as it will default to 'siswas' (plural of 'siswa')
    protected $table = 'siswa';

    // Define which attributes are mass assignable
    protected $fillable = [
        'nama_siswa', 'email', 'telepon',
    ];

    // Define the relationship with the 'Kelas' model
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_siswa');
    }
}
