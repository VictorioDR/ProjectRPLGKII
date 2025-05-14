<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemaat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('status_anggota')->default('aktif');
            $table->date('tanggal_bergabung')->nullable();
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });

        Schema::create('jadwal_ibadah', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai')->nullable();
            $table->string('tempat');
            $table->string('tema')->nullable();
            $table->string('pengkhotbah')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['aktif', 'selesai', 'dibatalkan'])->default('aktif');
            $table->timestamps();
        });

        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jemaat_id')->constrained('jemaat')->onDelete('cascade');
            $table->foreignId('jadwal_ibadah_id')->constrained('jadwal_ibadah')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', ['hadir', 'tidak_hadir', 'izin'])->default('hadir');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('jadwal_pelayanan', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['mingguan', 'kategorial']);
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai')->nullable();
            $table->string('tempat')->nullable();
            $table->string('wl')->nullable();
            $table->string('singers')->nullable();
            $table->string('firman_tuhan')->nullable();
            $table->string('multimedia')->nullable();
            $table->string('musik_sound')->nullable();
            $table->string('koordinator_ibadah')->nullable();
            $table->string('musik')->nullable();
            $table->string('sifat')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['aktif', 'selesai', 'dibatalkan'])->default('aktif');
            $table->timestamps();
        });

        Schema::create('laporan_keuangan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tanggal');
            $table->enum('jenis', ['pemasukan', 'pengeluaran']);
            $table->decimal('jumlah', 15, 2);
            $table->text('keterangan')->nullable();
            $table->enum('status', ['tertunggak', 'lunas'])->default('lunas');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });

        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->string('gambar_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengumuman');
        Schema::dropIfExists('laporan_keuangan');
        Schema::dropIfExists('jadwal_pelayanan');
        Schema::dropIfExists('absensi');
        Schema::dropIfExists('jadwal_ibadah');
        Schema::dropIfExists('jemaat');
    }
};
