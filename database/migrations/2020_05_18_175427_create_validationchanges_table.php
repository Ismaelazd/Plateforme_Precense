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
            $table->string('email');
            $table->string('rue')->nullable();
            $table->string('ville')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                        ->on('users')
                        ->references('id')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
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
