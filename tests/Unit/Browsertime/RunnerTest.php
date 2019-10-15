<?php

namespace Tests\Unit\Browsertime;

use App\Browsertime\Result;
use App\Browsertime\Runner;
use Tests\TestCase;

class RunnerTest extends TestCase
{
    /** @test */
    public function it_can_run()
    {
        $runner = new Runner('http://localhost');
        $this->assertTrue(method_exists($runner, 'run'));
        $result = $runner->run('localhost_test.png');
        $this->assertInstanceOf(Result::class, $result);

        $this->assertIsArray($result->getTimings());
        $this->assertIsArray($result->getPageInfo());
        $this->assertIsInt($result->getTransferSize());
        $this->assertIsInt($result->getTiming(Result::TIMING_FIRST_PAINT));
        $this->assertIsInt($result->getTiming(Result::TIMING_FULLY_LOADED));
    }
}
