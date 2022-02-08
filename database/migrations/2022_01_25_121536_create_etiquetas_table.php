<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtiquetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquetas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('rastreio', 32)->unique();
            $table->string('status', 32);
            $table->foreignId('destinatarios_id')->constrained('destinatarios');
            $table->foreignId('enderecos_id')->constrained('enderecos');
            $table->foreignId('lojas_id')->constrained('lojas_clientes');
            $table->string('origem', 32);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etiquetas');
    }
}
