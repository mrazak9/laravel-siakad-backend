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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('lecturer_id')->unsigned();
            //semester
            $table->string('semester');
            //tahun akademik
            $table->string('tahun_akademik');
            //sks
            $table->string('sks');
            //kode matakuliah
            $table->string('kode_matakuliah');
            //description
            $table->string('deskripsi');
            $table->timestamps();

            $table->foreign('lecturer_id', 'lecturerid_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject');
    }
};