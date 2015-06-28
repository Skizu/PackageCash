    <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('transactions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->char('description');
            $table->decimal('amount');

            $table->integer('user_id');
            $table->string('source_type');
            $table->integer('source_id');
            $table->string('destination_type');
            $table->integer('destination_id');

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
        Schema::drop('transactions');
	}

}
