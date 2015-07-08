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
            $table->decimal('amount', 15, 2);

            $table->integer('user_id');
            $table->string('source_type');
            $table->integer('source_id');
            $table->string('destination_type');
            $table->integer('destination_id');

            $table->timestamps();

            $table->index(['id', 'user_id', 'source_type', 'source_id', 'destination_type', 'destination_id']);
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
