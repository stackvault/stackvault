<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pagespeed_pages';
    const CREATED_AT = 'date_added';
    const UPDATED_AT = null;
    const DELETED_AT = 'date_deleted';

    public $timestamps = true;
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
