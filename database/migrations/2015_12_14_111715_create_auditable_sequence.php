<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditableSequence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            DB::statement('CREATE SEQUENCE auditable_seq;');
            DB::statement('CREATE OR REPLACE FUNCTION json_array_int(_j JSON)
                RETURNS INT[] AS
                $$
                SELECT array_agg(elem::text::int)
                FROM json_array_elements(_j) AS elem
                $$
            LANGUAGE SQL IMMUTABLE;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP SEQUENCE auditable_seq;');
    }
}
