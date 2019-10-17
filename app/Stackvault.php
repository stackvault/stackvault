<?php
namespace App;
use Illuminate\Foundation\Application;

class Stackvault extends Application {

    public function __construct($basePath = null)
    {
        parent::__construct($basePath);
    }

    public function getNavLinks()
    {
        return [
            [
                'name' => 'Home',
                'url' => route('home'),
            ],
            [
                'name' => 'Pagespeed',
                'url' => route('pagespeed.index'),
            ],
        ];
    }

}