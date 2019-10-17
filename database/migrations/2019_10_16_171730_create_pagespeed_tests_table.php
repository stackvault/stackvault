<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagespeedTestsTable extends Migration
{
    public function up()
    {
        Schema::create('pagespeed_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->bigInteger('page_id', false, true);
            $table->bigInteger('email_id', false, true)->nullable();
            $table->integer('timing_domain_lookup', false, true); // Milliseconds
            $table->integer('timing_server_connect', false, true); // Milliseconds
            $table->integer('timing_server_response', false, true); // Milliseconds
            $table->integer('timing_first_paint', false, true); // Milliseconds
            $table->integer('timing_dom_interactive', false, true); // Milliseconds
            $table->integer('timing_fully_loaded', false, true); // Milliseconds

            $table->integer('pageinfo_transfer_size', false, true); // Bytes
            $table->integer('http_status_code');
            $table->integer('result_code');
            $table->string('result_text');

            $table->dateTime('date_added')->nullable(false);
            $table->dateTime('date_completed')->nullable()->default(null);

            $table->foreign('page_id')->references('id')->on('pagespeed_pages');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagespeed_tests');
    }
}
