<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagespeedPagesTable extends Migration
{
    public function up()
    {
        Schema::create('pagespeed_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url', 255)->nullable(false);
            $table->string('email', 255)->nullable(false);
            $table->boolean('newsletter_opted_in')->default(false);
            $table->dateTime('date_added')->nullable(false);
            $table->dateTime('date_email_confirmed')->nullable()->default(null);
            $table->dateTime('date_unsubscribed')->nullable()->default(null);
            $table->dateTime('date_deleted')->nullable()->default(null);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagespeed_pages');
    }
}
