<?php

namespace App\Listeners;

use App\Models\ActivityLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuccessfulLogin
{
    private ActivityLog $log;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ActivityLog $log)
    {
        $this->log = $log;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->user) {
            $this->log->user_id = $event->user->id;
            $this->log->action = 'login';
            $this->log->result = 'successful';
            $this->log->save();
        }
    }
}
