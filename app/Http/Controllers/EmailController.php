<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
    	$title = $request->input('title');
        $content = $request->input('content');

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {
        	$message->from($address, $name = null);
        	$message->sender($address, $name = null);
        	$message->to($address, $name = null);
        	$message->cc($address, $name = null);
        	$message->bcc($address, $name = null);
        	$message->replyTo($address, $name = null);
        	$message->subject($subject);
        	$message->priority($level);

        });

        return response()->json(['message' => 'Request completed']);
    }

    public function senduitnodiging(Request $request, Scan $scan)
    {
        // return $request->all();
    	$user = $scan->beheerder;
    	$title = $request->subject;

        foreach($scan->participants as $participant)
        {
            $content = $request->body . '

Uw gebruikersnaam is: ' . $user->email . '
Uw wachtwoord is: ' . $user->initial_pwd;
            $data = ['title' => $title, 'content' => nl2br($content)];
    		Mail::send('emails.send', $data, function ($message) use ($user, $participant, $request)
    		{
    			$message->from('no-reply@implementatiescan.nl', 'Team Implementatiescan');
    			$message->to($participant->email, $participant->name_first . ' ' . $participant->name_last);
    			// $message->bcc($participant->email, $participant->name_first . ' ' . $participant->name_last);
    			$message->subject('Uitnodiging Implementatiescan');
                $message->replyTo($user->email, $user->name_first . ' ' . $user->name_last);
    		});
    	}
    	return $request->all();
    }
}

