<?php

namespace App\Browsertime;

use Illuminate\Support\Facades\Storage;

class Result
{
    private $resultDir;
    private $errors = [];
    private $json = [];
    private $timings = [];
    private $pageInfo = [];
    private $screenshotName;

    const TIMING_FIRST_PAINT = 'firstPaint';
    const TIMING_FULLY_LOADED = 'fullyLoaded';
    const TIMING_DOMAIN_LOOKUP = 'domainLookup';
    const TIMING_SERVER_CONNECT = 'serverConnect';
    const TIMING_SERVER_RESPONSE = 'serverResponse';
    const TIMING_DOM_INTERACTIVE = 'domInteractive';

    const PAGEINFO_TRANSFER_SIZE = 'transferSize';

    /**
     * Result constructor.
     * @param string $resultDir
     * @param string $screenshotName - including extension (.png)
     */
    public function __construct(string $resultDir, string $screenshotName)
    {
        $this->resultDir = rtrim($resultDir, '/') . '/';
        $this->screenshotName = $screenshotName;
        $this->parseResultDir();
    }

    public function parseResultDir()
    {
        $screenshotLocation = $this->resultDir . 'screenshots/1.png';
        $jsonLocation = $this->resultDir . 'browsertime.json';
        if (file_exists($screenshotLocation) === false) {
            $this->errors[] = 'Screenshot doesn\'t exist: ' . $jsonLocation;
        }

        if (file_exists($jsonLocation) === false) {
            $this->errors[] = 'JSON location doesn\'t exist: ' . $jsonLocation;
        }

        $rawJson = file_get_contents($jsonLocation);
        $this->json = json_decode($rawJson, true);
        if (json_last_error() != JSON_ERROR_NONE) {
            $this->errors[] = 'JSON location is not valid JSON (Failed to decode): ' . $jsonLocation;
        }

        if (empty($this->errors) === false) {
            throw new \LogicException(implode(PHP_EOL, $this->errors));
        }

        $this->json = array_shift($this->json);
        Storage::disk('public')->makeDirectory('screenshots');
        $this->parseJson($this->json);
        $this->moveScreenshotToPublic($screenshotLocation);
    }

    private function moveScreenshotToPublic(string $screenshotLocation)
    {
        return Storage::disk('public')->put('screenshots/' . $this->screenshotName, file_get_contents($screenshotLocation));
    }

    public function getScreenshotFilePath(): string
    {
        return Storage::disk('public')->path('screenshots/' . $this->screenshotName);
    }

    public function getScreenshotPublicPath(): string
    {
        return asset('storage/screenshots/' . $this->screenshotName);
    }

    public function removeScreenshot(): bool
    {
        return Storage::disk('public')->delete('screenshots/' . $this->screenshotName);
    }

    public function removeResultDir(): bool
    {
        return Storage::disk('public')->deleteDirectory($this->resultDir);
    }

    public function parseJson(array $json)
    {
        $this->pageInfo[self::PAGEINFO_TRANSFER_SIZE] = $json['statistics']['pageinfo']['documentSize']['transferSize']['median'];
        $this->timings[self::TIMING_FIRST_PAINT] = $json['statistics']['timings']['firstPaint']['median'];
        $this->timings[self::TIMING_FULLY_LOADED] = $json['statistics']['timings']['rumSpeedIndex']['median'];
        $this->timings[self::TIMING_DOMAIN_LOOKUP] = $json['statistics']['timings']['pageTimings']['domainLookupTime']['median'];
        $this->timings[self::TIMING_SERVER_CONNECT] = $json['statistics']['timings']['pageTimings']['serverConnectionTime']['median'];
        $this->timings[self::TIMING_SERVER_RESPONSE] = $json['statistics']['timings']['pageTimings']['serverResponseTime']['median'];
        $this->timings[self::TIMING_DOM_INTERACTIVE] = $json['statistics']['timings']['pageTimings']['domInteractiveTime']['median'];
    }

    public function getTimings(): array
    {
        return $this->timings;
    }

    public function getPageInfo(): array
    {
        return $this->pageInfo;
    }

    public function getTransferSize(): int
    {
        return $this->pageInfo[self::PAGEINFO_TRANSFER_SIZE];
    }

    /**
     * @param string $timingType - use the consts
     * @return mixed
     */
    public function getTiming(string $timingType)
    {
        return $this->timings[$timingType];
    }
}
