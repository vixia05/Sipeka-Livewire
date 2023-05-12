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
        Schema::create('nilai_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('np_user');

            $table->foreign('np_user')
                  ->references('np')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('no action');

            $table->float('nilai_murni');
            $table->float('nilai_akhir');
            $table->string('bulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_pegawai');
    }
};
