<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aspirasi_jemaat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jemaat_id')->nullable()->constrained('jemaat')->onDelete('set null');
            $table->string('nama'); // sekarang required
            $table->string('email'); // sekarang required
            $table->text('aspirasi');
            $table->enum('status', ['pending', 'reviewed', 'addressed'])->default('pending'); // sinkron dengan controller
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasi_jemaat');
    }
};
