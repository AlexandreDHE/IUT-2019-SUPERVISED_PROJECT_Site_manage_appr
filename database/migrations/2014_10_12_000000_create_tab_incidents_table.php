
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tab_incidents', function (Blueprint $table) {
          $table->longText('Accidents')->default(null);
          $table->longText('Pannes')->default(null);
          $table->longText('Autres')->default(null);
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
        Schema::dropIfExists('tab_incidents');
    }
}
