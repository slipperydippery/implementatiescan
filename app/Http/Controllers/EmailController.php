<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $scan = $scan;
        // return $request->all();
    	$user = $scan->beheerder;
    	$title = $request->subject;

        foreach($request->recipients as $recipient)
        {
            $participant = User::findOrFail($recipient);
            $content = 'Beste ' . $participant->name_first . ' ' . $participant->name_last . ',

            ';
            $content .= $request->body . '

Tijdens de implementatiescan sessie maken we gebruik van www.implementatiescan.nl. U dient een tablet of laptop mee te nemen met toegang tot internet. U kunt inloggen met uw persoonlijke gegevens. Met deze gegevens kunt u ook alvast kijken hoe de scan werkt. Dit zijn uw inloggegevens:
Uw gebruikersnaam is: ' . $participant->email;
            if (Hash::check($participant->initial_pwd, $participant->password)){
                $content .= '
Uw wachtwoord is: ' . $participant->initial_pwd;
            }
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
    	return view ('pages.voorzitter.bedankt', compact('scan'));
    }

    public function verzendacties(Request $request, Scan $scan)
    {
        // return $request;
        // return 'verzending it';
        $user = $scan->beheerder;
        $title = '';
        $content = $request->mail_intro . ' <br><br> ' . $request->verbeteractietext;
        $cc_recipients = [];
        foreach($request->recipients as $recipient){
            $recipient = User::findOrFail($recipient);
              // $ua = [];
              // $ua['email'] = $ccadress;
              // $ua['name'] = $ccname;
              // $users[$key] = (object)$ua;
              $cc_recipients[] = $recipient->email; 
        }
        // return $cc_recipients;

        $data = ['title' => $title, 'content' => nl2br($content)];
        Mail::send('emails.send', $data, function ($message) use ($user, $request, $cc_recipients)
        {
            $message->from('no-reply@implementatiescan.nl', 'Team Implementatiescan');
            $message->to($user->email, $user->name_first . ' ' . $user->name_last);
            // $message->bcc($participant->email, $participant->name_first . ' ' . $participant->name_last);
            $message->subject('Uitnodiging Implementatiescan');
            $message->replyTo($user->email, $user->name_first . ' ' . $user->name_last);

            $message->cc($cc_recipients);
        });

        return view ('scans.verzonden');
    }
}

