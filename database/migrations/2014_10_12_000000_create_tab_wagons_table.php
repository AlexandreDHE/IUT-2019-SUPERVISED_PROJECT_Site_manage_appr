<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabWagonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tab_wagons', function (Blueprint $table) {
          $table->string('Nom')->default(null);
          $table->string('NbDemande')->default(null);
          $table->string('NbFournis')->default(null);
          $table->string('NbCharDechar')->default(null);
          $table->integer('NumLigne')->default(null);
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
        Schema::dropIfExists('tab_wagons');
    }
}
