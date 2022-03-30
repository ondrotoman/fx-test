<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use App\Src\Contracts\CreateActivityLogs;
use Illuminate\Contracts\Queue\ShouldQueue;

class FailedLogin
{

    private CreateActivityLogs $creator;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CreateActivityLogs $creator)
    {
        $this->creator = $creator;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (!$event->user) { 
            return false;
        }
        
        $this->creator->create(
            $event->user,
            'Prihlásenie',
            'failed',
        );        
    }
}
