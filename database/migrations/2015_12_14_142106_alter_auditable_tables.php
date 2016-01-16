<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAuditableTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            DB::statement('ALTER TABLE "users" ADD COLUMN auditable_id INTEGER DEFAULT nextval(\'auditable_seq\');');
            DB::statement('ALTER TABLE "cheques" ADD COLUMN auditable_id INTEGER DEFAULT nextval(\'auditable_seq\');');
            DB::statement('ALTER TABLE "envelopes" ADD COLUMN auditable_id INTEGER DEFAULT nextval(\'auditable_seq\');');
            DB::statement('ALTER TABLE "transfers" ADD COLUMN auditable_id INTEGER DEFAULT nextval(\'auditable_seq\');');
            DB::statement('ALTER TABLE "transactions" ADD COLUMN auditable_id INTEGER DEFAULT nextval(\'auditable_seq\');');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('auditable_id');
        });
        Schema::table('cheques', function ($table) {
            $table->dropColumn('auditable_id');
        });
        Schema::table('envelopes', function ($table) {
            $table->dropColumn('auditable_id');
        });
        Schema::table('transfers', function ($table) {
            $table->dropColumn('auditable_id');
        });
        Schema::table('transactions', function ($table) {
            $table->dropColumn('auditable_id');
        });
    }
}
