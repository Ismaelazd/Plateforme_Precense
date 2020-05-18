<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidationchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validationchanges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->unique();
            $table->string('rue')->nullable();
            $table->string('ville')->nullable();
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('classe_id')->unsigned()->nullable();
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
        Schema::dropIfExists('validationchanges');
    }
}
