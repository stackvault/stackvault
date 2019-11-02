<?php

namespace App\Observers;

use App\Events\PageCreated;
use App\Page;
use Illuminate\Foundation\Bus\DispatchesJobs;

class PageObserver
{
    use DispatchesJobs;

    public function created(Page $page)
    {
        event(new PageCreated($page));
    }

}
