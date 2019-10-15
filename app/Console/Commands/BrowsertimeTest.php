<?php

namespace App\Console\Commands;

use App\Browsertime;
use App\Browsertime\Runner;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrowsertimeTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'browsertime:test {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the browsertime setup/integration works';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $browsertime = new Runner($this->argument('url'));
        $result = $browsertime->run('browsertimetest.png');
        var_dump($result->getTimings());
    }
}
