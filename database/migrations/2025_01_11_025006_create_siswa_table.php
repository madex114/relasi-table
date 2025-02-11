<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('siswa', function (Blueprint $table) {
        $table->id();        
        $table->foreignId('id_kelas')->constrained('kelas')->onDelete('cascade');
        $table->string('nama_siswa');
        $table->string('email')->unique();
        $table->string('telepon');
        $table->string('foto');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('siswa');
}

};
