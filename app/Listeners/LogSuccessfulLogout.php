<?php

namespace App\Listeners;

use Auth;
use Carbon\Carbon;
use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogout
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
     * @param  LogSuccessfulLogout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        Auth::user()->last_online = Carbon::yesterday();
        Auth::user()->save();
    }
}
