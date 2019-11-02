<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagespeedEmailVerificationCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagespeed_email_verification_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('page_id', false, true);
            $table->string('code', 200);
            $table->dateTime('date_added')->nullable(false);
            $table->dateTime('date_email_confirmed')->nullable()->default(null);
            $table->dateTime('date_deleted')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagespeed_email_verification_codes', function (Blueprint $table) {
            //
        });
    }
}
