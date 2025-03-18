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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->constrained('barangs');
            $table->string('id_penitip')->constrained('penitips');
            $table->integer('value');
            $table->timestamps();

            $table->foreign('kode_barang')->references('kode_barang')->on('barangs');

            $table->foreign('id_penitip')->references('id')->on('penitips');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
