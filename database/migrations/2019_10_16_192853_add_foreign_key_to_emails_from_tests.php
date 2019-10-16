<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToEmailsFromTests extends Migration
{
    public function up()
    {
        Schema::table('pagespeed_tests', function (Blueprint $table) {
            $table->foreign('email_id')->references('id')->on('pagespeed_emails');
        });
    }

    public function down()
    {
        Schema::table('pagespeed_tests', function (Blueprint $table) {
            $table->dropForeign('pagespeed_tests_email_id_foreign');
        });
    }
}
