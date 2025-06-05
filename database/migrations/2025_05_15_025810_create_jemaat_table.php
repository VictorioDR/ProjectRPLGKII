<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jemaat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('telepon')->nullable();
            $table->string('email')->nullable()->unique();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('status_pernikahan', ['belum_menikah', 'menikah', 'cerai', 'janda_duda'])->nullable();
            $table->enum('status', ['aktif', 'pindah', 'tidak_aktif', 'meninggal'])->default('aktif'); // ✅ tambahkan ini
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jemaat');
    }
};
