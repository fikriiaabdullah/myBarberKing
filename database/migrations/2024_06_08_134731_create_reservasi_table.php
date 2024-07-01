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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('time')->default(now());;
            $table->unsignedBigInteger('outlet_id');
            $table->foreign('outlet_id')->references('id')->on('outlet');
            $table->unsignedBigInteger('layanan_id');
            $table->foreign('layanan_id')->references('id')->on('layanan');
            $table->unsignedBigInteger('barberman_id');
            $table->foreign('barberman_id')->references('id')->on('barberman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
