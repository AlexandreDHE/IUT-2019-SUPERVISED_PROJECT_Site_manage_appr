<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
          $table->integer('create_by')->default(null);
          $table->increments('id')->default(null);
          $table->string('nom')->default(null);
          $table->string('prénom')->default(null);
          $table->string('fonction')->default(null);
          $table->string('email')->unique();
          $table->string('num_tel')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password'); /*   $2y$10$QgM8VUrA1QiIYDt2rqe52eSGbDwbhntqeKgQL0I.prn7lP7HOv5jq */
          $table->string('etat_compte')->default('actif');
          $table->rememberToken(); /*  wwsv2ddpWcpUVlbYuVXd6lmr4AFLAiB7g5iuGLteiLR34GgGcfvNeixIiJCn  */
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
        Schema::dropIfExists('users');
    }
}
