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
        Schema::create('siswas', function (Blueprint $table) {
            $table->char('nisn')->primary();
            $table->char('nis');
            $table->string('nama');
            $table->text('alamat');
            $table->string('telp');
            $table->foreignId('idKelas')->constrained('kelass')->cascadeOnDelete();
            $table->foreignId('idSpp')->constrained('spps')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
