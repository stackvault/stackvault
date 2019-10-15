<?php

namespace App\Browsertime;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Runner
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
        'skipHar' => 'true',
        'silent' => true,
        'q' => true, // Silent again, so it's doubly silent
    ];

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->browsertimePath = realpath(__DIR__ . '/../../') . '/node_modules/.bin/browsertime';
        $resultDir = 'browsertime/' . Str::random(18) . base64_encode(microtime() . $this->url);
        Storage::disk('local')->makeDirectory($resultDir);
        $this->setResultDir(Storage::disk('local')->path($resultDir));
    }

    /**
     * @param string $dir
     */
    public function setResultDir(string $dir)
    {
        $this->arguments['resultDir'] = $dir;
    }

    public function getResultDir(): string
    {
        return $this->arguments['resultDir'];
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

    /**
     * @param string $screenshotName - including extension (.png) - this will overwrite any file with the same name, please generate a sensible unique name
     * @return Result
     */
    public function run(string $screenshotName)
    {
        $command = $this->buildCommand();
        $process = new Process(explode(' ', $command));
        $process->run();

        // Executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $result = new Result($this->getResultDir(), $screenshotName);

        return $result;
    }

    public function setIterations(int $iterations)
    {
        $this->arguments['iterations'] = $iterations;
    }
}
