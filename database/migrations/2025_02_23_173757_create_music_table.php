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
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('url'); // URL do vídeo (YouTube)
            $table->string('title'); // Nome da música
            $table->integer('views'); // Número de visualizações
            $table->string('cover'); // URL da capa da música
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status de aprovação
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};
