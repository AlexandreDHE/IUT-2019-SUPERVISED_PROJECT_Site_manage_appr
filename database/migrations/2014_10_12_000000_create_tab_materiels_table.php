<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tab_materiels', function (Blueprint $table) {
          $table->string('Reférence')->default(null);
          $table->string('Fixe_or_renfort')->default(null);
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
        Schema::dropIfExists('tab_materiels');
    }
}
