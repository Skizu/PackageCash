<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChequeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('amount');

            $table->integer('user_id');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cheques');
    }
}
