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
        Schema::create('jadwal_ibadah', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('wl');
            $table->string('singers');
            $table->string('tim_musik');
            $table->string('pengkhotbah');
            $table->string('tempat');
            $table->string('multimedia');
            $table->string('deskripsi')->nullable();
            $table->string('judul')->nullable();
            $table->string('status')->nullable();
            $table->string('tema')->nullable();
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_ibadah');
    }
};
