<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabAvancementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tab_avancements', function (Blueprint $table) {
          $table->integer('Voie')->default(null);
          $table->integer('PkD')->default(null);
          $table->integer('PkF')->default(null);
          $table->string('PhaseRelevage')->default(null);
          $table->string('Finition')->default(null);
          $table->string('TauxConduc')->default(null);
          $table->string('PhaseNivel')->default(null);
          $table->integer('NumLigne')->default(null);
          $table->timestamp('Date');
          $table->increments('Id')->default(null);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_avancements');
    }
}
