<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messageries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')
                        ->on('users')
                        ->references('id')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->bigInteger('ecrivain_id')->unsigned();
            $table->foreign('ecrivain_id')
                        ->on('users')
                        ->references('id')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->text('message');
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
        Schema::dropIfExists('messageries');
    }
}
