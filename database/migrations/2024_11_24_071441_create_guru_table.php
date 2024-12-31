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
    Schema::create('guru', function (Blueprint $table) {
        $table->id();
        $table->string('nama_guru');
        $table->string('email')->unique();
        $table->string('telepon');
        $table->string('keahlian');        
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('guru');
}

};
