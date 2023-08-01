<?php

namespace App\Jobs;

use App\Models\UserLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserActionLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user_id;
    private $event;
    private $data;

    /**
     * Create a new job instance.
     */
    public function __construct($user_id,$event,$data =[])
    {
        $this->user_id = $user_id;
        $this->event  = $event ;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        UserLog::create([
            'user_id' => $this->user_id,
            'event' => $this->event,
            'data' => json_encode($this->data),
        ]);
    }
}
