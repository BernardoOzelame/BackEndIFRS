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
        Schema::create('cardapios_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cardapioId')->references('id')->on('cardapios')->onDelete('cascade');
            $table->foreignId('itemId')->references('id')->on('itens')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cardapios_itens');
    }
};
