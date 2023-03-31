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
        Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->string('sub_kriteria');
            $table->integer('bobot_nilai');
            $table->integer('poin_max');
            $table->foreignId('id_kriteria_penilaian')
                  ->constrained('kriteria_penilaian')
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
        Schema::dropIfExists('sub_kriteria');
    }
};
