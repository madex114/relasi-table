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
        'id_guru', 'bidang_kelas', 'harga',
    ];

    // Define the relationship with the 'Guru' model
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

}
