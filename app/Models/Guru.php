<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // Table name is optional, as it will default to 'gurus' (plural of 'guru')
    protected $table = 'guru';

    // Define which attributes are mass assignable
    protected $fillable = [
        'nama_guru', 'email', 'telepon', 'keahlian',
    ];

    // Define the relationship with the 'Kelas' model
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_guru');
    }
}
