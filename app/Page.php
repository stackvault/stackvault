<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pagespeed_pages';

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
