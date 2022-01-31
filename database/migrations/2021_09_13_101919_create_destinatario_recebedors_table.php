<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinatarioRecebedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinatario_recebedors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pacotes_id')->constrained('pacotes');
            $table->string('recebedor');
            $table->string('nome');
            $table->string('documento');
            $table->string('obsevacoes')->nullable();
            $table->string('img_pacote')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinatario_recebedors');
    }
}
