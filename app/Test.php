<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'pagespeed_tests';
    public $timestamps = false;
    protected $dates = [
      'date_added',
      'date_completed',
    ];

    public function email()
    {
        return $this->hasOne(Email::class);
    }
}
