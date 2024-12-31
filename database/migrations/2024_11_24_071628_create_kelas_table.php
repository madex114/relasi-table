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
    Schema::create('kelas', function (Blueprint $table) {
        $table->id();        
        $table->foreignId('id_guru')->constrained('guru')->onDelete('cascade');
        $table->foreignId('id_siswa')->constrained('siswa')->onDelete('cascade');
        $table->string('nama_kelas');
        $table->string('kapasitas');         
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('kelas');
}

};
