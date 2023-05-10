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
        Schema::create('evaluasi_penilaian', function (Blueprint $table) {
            $table->id();
            $table->integer('start');
            $table->integer('end');
            $table->string('evaluasi');
            $table->foreignId('id_sub_indikator')
                  ->constrained('sub_indikator')
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
        Schema::dropIfExists('evaluasi_penilaian');
    }
};
