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
        Schema::create('detail__penjualans', function (Blueprint $table) {
            $table->id('id_detail_penjualan');
            $table->integer('id_penjualan')->constrained('penjualans')->onDelete('cascade');
            $table->string('no_nota');
            $table->double('komisi');
            $table->double('total_transaksi');
            $table->double('total_penitip');
            $table->double('total_reusemart');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__penjualans');
    }
};
