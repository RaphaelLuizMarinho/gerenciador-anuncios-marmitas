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
        Schema::create('refeicao', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->longText('descricao');
            $table->integer('quantidade');
            $table->date('data_fabricacao');
            $table->date('data_validade');
            $table->string('igredientes');
            $table->string('local_retirada');
            $table->string('modo_armazenamento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refeicao');
    }
};
