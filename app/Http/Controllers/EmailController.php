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
    	$user = $scan->beheerder;
    	$title = $request->subject;
    	foreach($scan->participants as $participant)
    	{
    		$content = nl2br($request->body);
    		Mail::send('emails.uitnodigingsmail', ['title' => $title, 'content' => $content, 'user' => $user, 'participant' =>$participant], function ($message) use ($user, $participant, $request)
    		{
    			$message->from($user->email, $user->name_first . ' ' . $user->name_last);
    			$message->to($user->email, $user->name_first . ' ' . $user->name_last);
    			$message->bcc($participant->email, $participant->name_first . ' ' . $participant->name_last);
    			$message->subject($request->subject);
    		});
    	}
    	return $request->all();
    }
}
