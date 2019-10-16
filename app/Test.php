<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'pagespeed_tests';

    public function email()
    {
        return $this->hasOne(Email::class);
    }
}
