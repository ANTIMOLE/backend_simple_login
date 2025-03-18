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
        Schema::create('klaims', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans');
            $table->foreign('id_suvenir')->references('id')->on('suvenirs');
            $table->double('total_poin');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('pelanggans');
            $table->foreign('id_suvenir')->references('id')->on('suvenirs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klaims');
    }
};
