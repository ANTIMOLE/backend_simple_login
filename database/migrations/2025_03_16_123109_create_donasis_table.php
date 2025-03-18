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
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->string('id_penerima')->constraint('penerimas');
            $table->string('id_barang_donasi')->constrained('barang_donasis');
            $table->date('tanggal_donasi');
            $table->enum('status', ['Diterima', 'Belum Diterima']);
            $table->timestamps();

            $table->foreign('id_penerima')->references('id')->on('penerimas');
            $table->foreign('id_barang_donasi')->references('id')->on('barang_donasis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
