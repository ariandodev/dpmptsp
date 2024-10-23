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
        Schema::table('skm_hasil', function (Blueprint $table) {
            $table->bigInteger('skm_unsur_id');
            $table->bigInteger('skm_unit_layanan_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skm_hasil', function (Blueprint $table) {
            $table->dropColumn('skm_unsur_id');
            $table->dropColumn('skm_unit_layanan_id');
        });
    }
};
