<?php

namespace Tests\Unit;

use App\Browsertime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrowsertimeTest extends TestCase
{
    /** @test */
    public function it_can_run()
    {
        $browsertime = new Browsertime();
        $browsertime->run();
    }
}
