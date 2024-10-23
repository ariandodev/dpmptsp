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
        Schema::rename('skm_jawaban_pertanyaan', 'skm_hasil');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('skm_hasil', 'skm_jawaban_pertanyaan');
    }
};
