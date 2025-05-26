<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_pelayanan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('tempat');
            $table->string('wl')->nullable();
            $table->string('singers')->nullable();
            $table->string('firman_tuhan')->nullable();
            $table->string('multimedia')->nullable();
            $table->string('musik_sound')->nullable();
            $table->string('koordinator_ibadah')->nullable();
            $table->string('musik')->nullable();
            $table->enum('sifat', ['umum', 'khusus'])->default('umum');
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['active', 'cancelled', 'completed'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelayanan');
    }
};
