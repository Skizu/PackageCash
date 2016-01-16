<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_log', function (Blueprint $table) {
            $table->increments('id');

            $table->json('data');

            $table->timestamps();
        });

        DB::statement('CREATE INDEX ix_audit_log_auditableid ON audit_log USING GIN (json_array_int(data->\'AuditableID\'));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('audit_log');
    }
}