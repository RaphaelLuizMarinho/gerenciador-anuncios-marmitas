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
        Schema::create('instituicao', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('telefone');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('crn_responsavel');
            $table->string('status_recebimento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instituicao');
    }
};
