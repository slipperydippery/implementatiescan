<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvitation extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($user, $request)
    {
        $this->sendEmail($user, $request);
    }

    public function prepareEmail($user, $request)
    {
        $title = 'Uitnodiging Implementatiescan';
        $content = $request->input('email_bericht') . '

Uw gebruikersnaam is: ' . $user->email . '
Uw wachtwoord is: ' . $user->initial_pwd;
        $data = ['title' => '', 'content' => nl2br($content)];
        Mail::send('emails.send', $data , function ($message) use ($request)
        {
            $message->from('no-reply@implementatiescan.nl', 'Implementatiescan');
            $message->to($request->input('beheerder_email'));
            $message->subject('Uitnodiging Implementatiescan');
        });

        return $this;
    }
}

           
            







