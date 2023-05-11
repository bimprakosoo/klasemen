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
        Schema::create('skors', function (Blueprint $table) {
            $table->id();
            $table->integer('pertandingan');
            $table->foreignId('klub_id');
            $table->integer('skor');
            $table->timestamps();
          
            $table->index('klub_id');
            $table->foreign('klub_id')->references('id')->on('klubs')->onDelete('cascade');
  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skors');
    }
};
