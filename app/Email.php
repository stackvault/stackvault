<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'pagespeed_emails';
    public $timestamps = false;
    protected $dates = [
        'date_sent'
    ];
}
