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
        Schema::table('outlet', function (Blueprint $table) {
            $table->string('photo_path')->nullable();
            // Add more columns as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('outlet', function (Blueprint $table) {
            $table->dropColumn('photo_path');
            // Drop more columns if needed
        });
    }
};
