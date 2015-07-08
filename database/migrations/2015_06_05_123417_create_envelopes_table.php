<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvelopesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('envelopes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->char('name');
            $table->integer('amount');

            $table->integer('user_id');

			$table->timestamps();

            $table->index(['id', 'user_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('envelopes');
	}

}
