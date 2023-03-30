<?php

namespace App\Listeners;

use App\Events\UsersSoftDelete;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class execUsersSoftDelete
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UsersSoftDelete $event)
    {
        //
        $userId = $event->user->id;
        $event->user->posts()->where('user_id',$userId)->delete();
    }
}
