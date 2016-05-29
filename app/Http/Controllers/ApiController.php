<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Thema;
use App\Instantie;
use App\Http\Requests;
use Illuminate\Http\Request;

class ApiController extends Controller
{
	public function participantsininstantie(Scan $scan)
	{
		$instanties = [];
		foreach($scan->instanties as $instantie)
		{
			$instanties[] = $instantie->with('participants')->get();
		}
		return instanties;
	}

    public function abanswered(Scan $scan)
    {
    }

    public function themaanswered(Scan $scan, $thema_id)
    {
    	$todo = 0;
    	if ($thema_id == 0){
    		$todo += count($scan->participants);
	    	foreach($scan->participants as $participant)
	    	{
	    		if(count($participant->answers->intersect($scan->answers)) > 0)
	    		{
	    			$todo--;
	    		}
	    	};
	    } else {
	    	$thema = Thema::findOrFail($thema_id);
	    	foreach($thema->questions as $question)
	    	{
	    		$todo += count($scan->participants);
	    		foreach($scan->participants as $participant)
	    		{
	    			if(count($participant->answers->intersect($question->answers)) > 0)
	    			{
	    				$todo--;
	    			}
	    		}
	    	}
	    }
    	return $todo;
    	return '0';
    }

    public function slidervalue(Scan $scan, $thema_id, User $user)
    {
    	if($thema_id == 0) 
    	{
	    	if(count($user->answers->intersect($scan->answers)) > 0)
	    	{
				return $user->answers->intersect($scan->answers)->last()->value;
	    	}
    	} else {
    		$thema = Thema::findOrFail($thema_id);
    		if(count($user->answers->intersect($thema->answers)) > 0)
    		{
    			return $user->answers->intersect($scan->answers)->last()->value;
    		}
    	}
    	return 50;
    }

    public function setslidervalue(Request $request, Scan $scan, $thema_id, User $user)
    {
    	
    }

    public function getParticipantABValues(Scan $scan, $thema_id)
    {
    	$instantiePartValues = [];
    	foreach($scan->instanties as $instantie)
    	{
	    	$partvalues['participants'] = [];
    		$partvalues['id'] = $instantie->id;
    		$partvalues['title'] = $instantie->title;
    		$participants = [];
	    	foreach($instantie->participants as $participant)
	    	{
	    		$newpart = [];
	    		$newpart['id'] = $participant->id;
	    		$newpart['name_first'] = $participant->name_first;
	    		$newpart['name_last'] = $participant->name_last;
	    		$newpart['instantie_id'] = $participant->instanties->intersect($scan->instanties)->first();
                if($thema_id == 0)
                {
                    $newpart['abvalue'] = $participant->answers->intersect($scan->answers)->first();
                    return ('this');
                } else {
                    $thema = Thema::findOrFail($thema_id);
    	    		$newpart['abvalue'] = $participant->answers->intersect($thema->answers)->first();
                }
	    		$participants[] =  $newpart;
	    	}
    		$partvalues['participants'] = $participants;
	    	$instantiePartValues[$instantie->title] = $partvalues;
    	}
    	return $instantiePartValues;
    }

    public function participants(Scan $scan)
    {
    	$instanties = [];
    	foreach($scan->instanties as $instantie)
    	{
    		$thisinstantie['participants'] = [];
    		$thisinstantie['id'] = $instantie->id;
    		$thisinstantie['title'] = $instantie->title;
    		$participants = [];
	    	foreach($instantie->participants as $participant)
    		{
    			$thisparticipant = [];
    			$thisparticipant['id'] = $participant->id;
    			$thisparticipant['name_first'] = $participant->name_first;
    			$thisparticipant['name_last'] = $participant->name_last;
    			$thisparticipant['email'] = $participant->email;
    			$thisparticipant['instantie_id'] = $participant->instanties->intersect($scan->instanties)->first()->id;
    			(count($participant->beheert->intersect([$scan])) > 0) ? $thisparticipant['beheerder'] = true : $thisparticipant['beheerder'] = false;
                // $thisparticipant['edit'] = false;
    			$participants[] = $thisparticipant;
    		}
    		$thisinstantie['participants'] = $participants;
    		$instanties[$instantie->title] = $thisinstantie;
    	}
    	return $instanties;
    }

    public function updateparticipant(Request $request, Scan $scan, User $user)
    {
        $user->name_first = $request->participant['name_first'];
        $user->name_last = $request->participant['name_last'];
        $user->email = $request->participant['email'];
        $currentinstantie = $user->instanties->intersect($scan->instanties)->first();
        $newinstantie = Instantie::findOrFail($request->instantie);
        $user->instanties()->detach($currentinstantie);
        $user->instanties()->attach($newinstantie);
        $user->save();
        return $request;
    }

    public function savenewparticipant(Request $request, Scan $scan)
    {
        if (! User::where('email', '=', $request->participant['email'])->get()->count())
        {
	    	$user = new User();
	        $user->name_first = $request->participant['name_first'];
	        $user->name_last = $request->participant['name_last'];
	        $user->email = $request->participant['email'];
	        $user->save();
        }
        $user = User::where('email', '=', $request->participant['email'])->first();
        if($user->scans->intersect([$scan])->count()) { return 'hello'; };
        $instantie = Instantie::findOrFail($request->participant['instantie_id']);
        $user->instanties()->attach($instantie);
    	return $request->all();
    }

    public function removeparticipant(Scan $scan, User $user)
    {
    	if($user->instanties->intersect($scan->instanties)->count())
    	{
	    	$instantie = $user->instanties->intersect($scan->instanties)->first();
	    	$user->instanties()->detach($instantie);
    	}
    	$user->scans()->detach($scan);
    	return;
    }

    public function getThemaOverzichtValues(Scan $scan, Thema $thema)
    {
        $themaOverzicht = [];
        foreach($scan->instanties as $instantie)
        {
            $thisinstantie = [];
            $participants = [];
            foreach($instantie->participants as $participant)
            {
                $thisparticipant = [];
                $questions =[];
                foreach($thema->questions as $question)
                {
                    $thisquestion = [];
                    $thisquestion['value'] = $question->answers->intersect($participant->answers)->first();
                    $thisquestion['question'] = $question;
                    $questions[$question->id] = $thisquestion;
                }
                $thisparticipant['questions'] = $questions;
                $participants[$participant->id] = $thisparticipant;
            }
            $thisinstantie['participants'] = $participants;
            $themaOverzicht[$instantie->title] = $thisinstantie;
        }
        return $themaOverzicht;
    }


}


