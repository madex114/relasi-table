<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Table name is optional, as it will default to 'kelas'
    protected $table = 'kelas';

    // Define which attributes are mass assignable
    protected $fillable = [
        'id_guru', 'id_siswa', 'nama_kelas', 'kapasitas',
    ];

    // Define the relationship with the 'Guru' model
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    // Define the relationship with the 'Siswa' model
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
