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
        Schema::create('skm_pilihan_jawaban', function (Blueprint $table) {
            $table->id();
            $table->string('jawaban');
            $table->integer('bobot');
            $table->bigInteger('skm_pertanyaan_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skm_pilihan_jawaban');
    }
};
