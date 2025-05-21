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
        Schema::create('fasilitas_rumah_makans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rumah_makan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('fasilitas_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_rumah_makans');
    }
};
