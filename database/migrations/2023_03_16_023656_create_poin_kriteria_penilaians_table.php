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
        Schema::create('poin_kriteria_penilaian', function (Blueprint $table) {
            $table->id();
            $table->string('kriteria',25);
            $table->integer('poin');

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
        Schema::dropIfExists('poin_kriteria_penilaian');
    }
};
