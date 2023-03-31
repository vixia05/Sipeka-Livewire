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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('nama',25);
            $table->string('np_user');

            $table->foreign('np_user')
                  ->references('np')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('no action');

            $table->foreignId('id_divisi')
                  ->constrained('divisi')
                  ->onUpdate('cascade')
                  ->onDelete('no action');

            $table->foreignId('id_seksi')
                  ->constrained('seksi')
                  ->onUpdate('cascade')
                  ->onDelete('no action');

            $table->foreignId('id_unit')
                  ->constrained('unit')
                  ->onUpdate('cascade')
                  ->onDelete('no action');

            $table->foreignId('id_jabatan')
                  ->constrained('jabatan')
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
        Schema::dropIfExists('user_details');
    }
};
