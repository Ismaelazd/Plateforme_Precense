<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')
                ->on('events')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('etat_id')->unsigned();
            $table->foreign('etat_id')
                ->on('etats')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('file')->nullable();
            $table->string('note')->nullable();
            $table->bigInteger('etatfinal_id')->unsigned();
            $table->foreign('etatfinal_id')
                ->on('etatfinals')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->nullable();
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
        Schema::dropIfExists('presences');
    }
}
