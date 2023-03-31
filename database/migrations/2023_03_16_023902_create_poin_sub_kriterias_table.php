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
        Schema::create('poin_sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->string('sub_kriteria',50);
            $table->integer('poin');
            $table->string('evaluasi');

            $table->foreignId('id_poin_kriteria_penilaian')
                  ->constrained('poin_kriteria_penilaian')
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
        Schema::dropIfExists('poin_sub_kriteria');
    }
};
