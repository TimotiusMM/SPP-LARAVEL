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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggalBayar')->nullable();
            $table->unsignedInteger('jumlah')->default(0);
            $table->string('bulanBayar');
            $table->string('tahunBayar');
            $table->char('nisn', 10);
            $table->foreignId('idUser')->constrained('users')->cascadeOnDelete();
            $table->foreignId('idSpp')->constrained('spps')->cascadeOnDelete();
            $table->foreign('nisn')->references('nisn')->on('siswas')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
