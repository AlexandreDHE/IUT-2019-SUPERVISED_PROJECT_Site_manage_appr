

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabHorairesSdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tab_horaires_sds', function (Blueprint $table) {
          $table->time('AutoTrav')->default(null);
          $table->time('ConsCatAMHT')->default(null);
          $table->time('DepInstSE')->default(null);
          $table->time('ATTX')->default(null);
          $table->time('EnginLieuTrav')->default(null);
          $table->time('DebTrav')->default(null);
          $table->time('AVC')->default(null);
          $table->time('FinTravCoupeRail')->default(null);
          $table->time('DerniereTBA')->default(null);
          $table->time('DegRampe')->default(null);
          $table->time('FinBourr')->default(null);
          $table->time('DepTTXChan')->default(null);
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
        Schema::dropIfExists('tab_horaires_sds');
    }
}
