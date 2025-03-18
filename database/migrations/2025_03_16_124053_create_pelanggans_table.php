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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('noTelp');
            $table->string('password');
            $table->date('tanggal_lahir');
            $table->integer('poin');
            $table->tinyInteger('verified');
            $table->date('verified_at');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
