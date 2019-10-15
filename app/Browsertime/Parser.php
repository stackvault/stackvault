<?php

namespace App\Browsertime;

class Parser
{
    private $json;
    /*
     * string $json - full JSON from browsertime.json
     */
    public function __construct(string $json)
    {
        $this->json = $json;
    }
}
