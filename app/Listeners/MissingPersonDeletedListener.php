<?php

namespace App\Listeners;

use App\Events\MissingPersonDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\MissingPersonFound;
use App\User;
class MissingPersonDeletedListener implements ShouldQueue
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
     * @param  MissingPersonDeleted  $event
     * @return void
     */
    public function handle(MissingPersonDeleted $event)
    {
        //
        $users = User::all();
        $users->each(function($item, $key) use($event){
          $item->notify(new MissingPersonFound($event->person));
        });
    }
}
