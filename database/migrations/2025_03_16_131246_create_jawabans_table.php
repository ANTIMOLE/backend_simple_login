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
        Schema::create('jawabans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_forum')->constrained('forums');
            $table->integer('id_pertanyaan')->constrained('pertanyaans');
            $table->string('jawaban');

            $table->timestamps();

            $table->foreign('id_forum')->references('id')->on('forums');
            $table->foreign('id_pertaanyaan')->references('id')->on('pertanyaans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawabans');
    }
};
