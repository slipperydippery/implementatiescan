<?php

namespace App\Listeners;

use Auth;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin
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
     * @param  LogSuccessfulLogin  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Auth::user()->increment('logincount');
        // dd(Auth::user());
    }
}
