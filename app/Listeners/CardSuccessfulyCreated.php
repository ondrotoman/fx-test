<?php

namespace App\Listeners;

use App\Models\ActivityLog;
use Illuminate\Queue\InteractsWithQueue;
use App\Src\Contracts\CreateActivityLogs;
use Illuminate\Contracts\Queue\ShouldQueue;

class CardSuccessfulyCreated
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
        $this->creator->create(
            $event->user,
            sprintf('Vytvorenie karty: "%s"', $event->card->id),
            'successful',
        );
    }
}
