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
        Schema::create('skm_jawaban_pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('skm_pertanyaan_id');
            $table->bigInteger('skm_pilihan_jawaban_id');
            $table->bigInteger('skm_responden_id');
            $table->bigInteger('skm_layanan_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skm_jawaban_pertanyaan');
    }
};
