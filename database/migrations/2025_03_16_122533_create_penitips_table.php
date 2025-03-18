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
        Schema::create('penitips', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_pelanggan')->constrained('pelanggans');
            $table->string('nomer_induk_penduduk');
            $table->string('barang_titipan');
            $table->double('rating_total');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penitips');
    }
};
