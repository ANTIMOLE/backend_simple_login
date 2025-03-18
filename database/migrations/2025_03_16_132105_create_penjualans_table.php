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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans');
            $table->foreign('id_penitip')->references('id')->on('penitips');
            $table->double('total');
            $table->tinyInteger('status');
            $table->string('tipe');
            $table->string('bukti_transfer');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('pelanggans');
            $table->foreign('id_penitip')->references('id')->on('penitips');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
