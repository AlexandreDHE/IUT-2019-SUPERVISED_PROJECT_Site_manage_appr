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
          $table->string('PhaseRelevage')->nullable();
          $table->string('Finition')->nullable();
          $table->string('TauxConduc')->nullable();
          $table->string('PhaseNivel')->nullable();
          $table->integer('NumLigne');
          $table->timestamp('Date');
          $table->integer('Id')->default(null);
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
