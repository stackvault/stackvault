<?php

namespace App;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Browsertime
{
    private $url;
    private $browsertimePath;
    private $arguments = [
        'iterations' => 1,
        'timeouts.pageLoad' => 10000,
        'screenshot' => 'true',
        'screenshotParams.type' => 'png',
        'viewPort' => '1280x800',
        'headless' => 'true',
        'useSameDir' => 'true',
        'browser' => 'chrome',
        'connectivity.profile' => 'cable',
    ];

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->browsertimePath = realpath(__DIR__ . '/../') . '/node_modules/.bin/browsertime';
    }

/*
--chrome.binaryPath=/usr/local/bin/chromium
--chrome.chromedriverPath=/home/ahindle/mycloud/stackvault.io/stackvault/vendor/bin/chromedriver-amd64
--resultDir=/tmp/browsertime_results_with_screenshots_video_and_json/
*/

    /**
    * string $dir - full path to result directory
    */
    public function setResultDir(string $dir)
    {
        $this->arguments['resultDir'] = $dir;
    }

    public function buildCommand(): string
    {
        $args = array_merge([$this->browsertimePath], $this->getCommandArguments());
        $args[] = $this->url;

        return implode(' ', $args);
    }

    public function getCommandArguments(): array
    {
        $args = $this->arguments;
        array_walk($args, function (&$value, $argument) {
            $value = sprintf('--%s="%s"', $argument, (string) $value);
        });

        return $args;
    }

    public function run()
    {
        $command = $this->buildCommand();
        $process = new Process(explode(' ', $command));
        $process->run();

        // Executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput() . PHP_EOL;
    }

    public function setIterations(int $iterations)
    {
        $this->arguments['iterations'] = $iterations;
    }
}
