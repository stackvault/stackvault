<?php

namespace App\Events;

use App\Mail\PagespeedEmailVerification;
use App\Page;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PageCreated
{
    use SerializesModels;

    public $page;

    /**
     * Create a new event instance.
     *
     * @param \App\Page $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }
}
