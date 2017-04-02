<?php

namespace App\Listeners;

use App\Events\MissingPersonCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Notifications\MissingPerson;
class MissingPersonCreatedListener implements ShouldQueue
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
     * @param  MissingPersonCreated  $event
     * @return void
     */
    public function handle(MissingPersonCreated $event)
    {
        //
        $users = User::all();
        $users->each(function($item, $key) use($event){
          $item->notify(new MissingPerson($event->person));
        });
    }
}
