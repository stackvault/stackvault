<?php

namespace App\Console\Commands;

use App\Browsertime;
use Illuminate\Console\Command;

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
        $browsertime = new Browsertime($this->argument('url'));
        $browsertime->run();
    }
}
