<?php

namespace App\Actions;

use App\Models\User;
use App\Models\ActivityLog;
use App\Src\Contracts\CreateActivityLogs;

class CreateActivityLog implements CreateActivityLogs
{
    private ActivityLog $log;
    
    public function __construct(ActivityLog $log)
    {
        $this->log = $log;
    }

    public function create(User $user, string $action, string $result)
    {
        return $this->log->create([
            'user_id' => $user->id,
            'action' => $action,
            'result' => $result
        ]);
    }
}
