<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagespeedEmailsTable extends Migration
{
    public function up()
    {
        Schema::create('pagespeed_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('test_ids'); // Faster
            $table->uuid('uuid');
            $table->integer('test_count');

            $table->integer('timing_domain_lookup_avg', false, true); // Milliseconds
            $table->integer('timing_server_connect_avg', false, true); // Milliseconds
            $table->integer('timing_server_response_avg', false, true); // Milliseconds
            $table->integer('timing_first_paint_avg', false, true); // Milliseconds
            $table->integer('timing_dom_interactive_avg', false, true); // Milliseconds
            $table->integer('timing_fully_loaded_avg', false, true); // Milliseconds
            $table->integer('pageinfo_transfer_size_avg', false, true); // Bytes

            $table->string('result_text');
            $table->dateTime('date_sent');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagespeed_emails');
    }
}
