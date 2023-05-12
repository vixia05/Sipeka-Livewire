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
        Schema::create('poin_indikator', function (Blueprint $table) {
            $table->id();
            $table->bigInt('id_indikator');
            $table->float('poin');

            $table->foreignId('id_nilai_pegawai')
                  ->constrained('nilai_pegawai')
                  ->onUpdate('cascade')
                  ->onDelete('no action');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin_indikator');
    }
};
