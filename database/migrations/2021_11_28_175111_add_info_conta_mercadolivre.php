<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoContaMercadolivre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('integracao_mercado_livres', function (Blueprint $table) {
            $table->string('nickname')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('brand_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('integracao_mercado_livres', function (Blueprint $table) {
            $table->dropColumn('nickname');
            $table->dropColumn('thumbnail');
            $table->dropColumn('brand_name');
        });
    }
}
