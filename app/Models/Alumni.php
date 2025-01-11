<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    // Table name is optional, as it will default to 'gurus' (plural of 'guru')
    protected $table = 'alumni';

    // Define which attributes are mass assignable
    protected $fillable = [
        'nama', 'no_hp', 'program', 'tahun', 'foto'
    ];

}
