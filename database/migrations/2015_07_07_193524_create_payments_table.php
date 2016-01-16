<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('description');
            $table->integer('amount');

            $table->integer('user_id');
            $table->string('source_type');
            $table->integer('source_id');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['user_id', 'source_type', 'source_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
