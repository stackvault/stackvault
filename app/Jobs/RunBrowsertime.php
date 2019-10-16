<?php

namespace App\Jobs;

use App\Browsertime\Result;
use App\Browsertime\Runner;
use App\Page;
use App\Test;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class RunBrowsertime implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $test = new Test();
        $test->uuid = Str::uuid();
        $test->date_added = Carbon::now('UTC');

        $runner = new Runner($this->page->url);
        $result = $runner->run($test->uuid . '.png');

        $test->page_id = $this->page->id;
        $test->timing_domain_lookup = $result->getTiming(Result::TIMING_DOMAIN_LOOKUP);
        $test->timing_server_connect = $result->getTiming(Result::TIMING_SERVER_CONNECT);
        $test->timing_server_response = $result->getTiming(Result::TIMING_SERVER_RESPONSE);
        $test->timing_first_paint = $result->getTiming(Result::TIMING_FIRST_PAINT);
        $test->timing_dom_interactive = $result->getTiming(Result::TIMING_DOM_INTERACTIVE);
        $test->timing_fully_loaded = $result->getTiming(Result::TIMING_FULLY_LOADED);

        $test->pageinfo_transfer_size = $result->getTransferSize();
        $test->http_status_code = 999;
        $test->result_code = 999;
        $test->result_text = '999';

        $test->date_completed = Carbon::now('UTC');

        $test->save();
    }
}
