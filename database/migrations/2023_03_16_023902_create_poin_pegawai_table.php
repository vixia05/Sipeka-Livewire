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
        Schema::create('poin_pegawai', function (Blueprint $table) {
            $table->id();
            $table->float('poin');
            $table->string('evaluasi');
            $table->bigint('id_indikator');
            $table->bigint('id_sub_indikator');
            $table->bigint('id_nilai_pegawai');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin_pegawai');
    }
};
