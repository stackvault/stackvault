<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pagespeed_pages';
    public $timestamps = false;
    protected $dates = [
        'date_added',
        'date_email_confirmed',
        'date_unsubscribed',
        'date_deleted',
    ];

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
