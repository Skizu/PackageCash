<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['source_type', 'source_id','destination_type', 'destination_id']);

            $table->integer('envelope_id');

            $table->foreign('envelope_id')->references('id')->on('envelopes');

            $table->index(['user_id', 'envelope_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
