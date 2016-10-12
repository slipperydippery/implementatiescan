<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Thema;
use App\Instantie;
use App\Programma;
use App\Scanmodel;
use App\Instrument;
use App\Http\Requests;
use App\Verbeteractie;
use App\Praktijkvoorbeeld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\StoreParticipantRequest;

class ApiController extends Controller
{

    public function verbeteracties( $thema)
    {
        $thema = Thema::findOrFail($thema);
        return $thema->verbeteracties;
    }

    public function indexbetrokkene(Verbeteractie $verbeteractie)
    {
        return $verbeteractie->betrokkenen;
    }

    public function addbetrokkene(Request $request, Verbeteractie $verbeteractie, User $user)
    {
        if(! $verbeteractie->betrokkenen->intersect([$user])->count())
        {
            $user->betrektVerbeteracties()->save($verbeteractie);
        }
        return 'yeah';
    }

    public function removebetrokkene(Verbeteractie $verbeteractie, User $user)
    {
        if( $verbeteractie->betrokkenen->intersect([$user])->count())
        {
            $user->betrektVerbeteracties()->detach($verbeteractie);
        }
        return 'gone';
    }

    public function updateverbeteractie(Request $request, Verbeteractie $verbeteractie)
    {
        $verbeteractie->active = $request->actie['active'];
        $verbeteractie->omschrijving = $request->actie['omschrijving'];
        if ($verbeteractie->trekker != $request->actie['user_id'])
        {
            if( $verbeteractie->trekker != null)
            {
                $verbeteractie->trekker()->detach($verbeteractie->trekker);
            }
            $trekker = User::findOrFail($request->actie['user_id']);
            $trekker->trektVerbeteracties()->save($verbeteractie);
        }

        $verbeteractie->save();
        return $verbeteractie;
         // return $request->actie;
    }

    public function setactieactive(Verbeteractie $verbeteractie)
    {
        $verbeteractie->active = true;
        return 'yes';
    }

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

    public function getNrUnanswered(Scan $scan, Thema $thema)
    {
        $unanswered = 0;
        foreach($scan->participants as $participant)
        {
            foreach($thema->questions as $question)
            {
                if(! count($participant->answers->intersect($question->answers)))
                {
                    $unanswered++;
                }
            }
        }
        return $unanswered;
    }

    public function getNrIncomplete(Scan $scan, Thema $thema)
    {
        $unanswered = 0;
        foreach($scan->participants as $participant)
        {
            $themaComplete = true;
            foreach($thema->questions as $question)
            {
                if($themaComplete == true && (! count($participant->answers->intersect($question->answers))))
                {
                    $themaComplete = false;
                    $unanswered++;                    
                }
            }
        }
        return $unanswered;
    }

    public function getWhoIncomplete(Scan $scan, Thema $thema)
    {
        $whoUnanswered = [];
        foreach($scan->participants as $participant)
        {
            $themaComplete = true;
            foreach($thema->questions as $question)
            {
                if($themaComplete == true && (! count($participant->answers->intersect($question->answers))))
                {
                    $themaComplete = false;
                    $whoUnanswered[] = $participant->name_first . ' ' . $participant->name_last;
                }
            }
        }
        return $whoUnanswered;
    }

    public function participants(Scan $scan)
    {
    	$instanties = [];
    	foreach($scan->instanties as $instantie)
    	{
    		$thisinstantie['participants'] = [];
    		$thisinstantie['id'] = $instantie->id;
            $thisinstantie['modelid'] = $instantie->instantiemodel->id;
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

    public function indexthema(Scan $scan)
    {
        $themas = $scan->scanmodel->themas;
        return $themas;
    }

    public function indexscanmodelthema()
    {
        $scanmodel = Scanmodel::findOrFail(1);
        $themas = $scanmodel->themas;
        return $themas;
    }

    public function indexthemaquestion(Thema $thema)
    {
        $questions = $thema->questions;
        return $questions;
    }

    public function indexscanthemaverbeteractie(Scan $scan, Thema $thema)
    {
        $verbeteracties = Verbeteractie::where('scan_id', '=', $scan->id)->where('thema_id', '=', $thema->id)->with('betrokkenen')->get();
        return $verbeteracties;
    }

    public function indexparticipant(Scan $scan)
    {
        $participants = [];
        foreach($scan->participants as $participant)
        {
            $thisparticipant = [];
            $thisparticipant['id'] = $participant->id;
            $thisparticipant['name_first'] = $participant->name_first;
            $thisparticipant['name_last'] = $participant->name_last;
            $thisparticipant['email'] = $participant->email;
            $thisparticipant['instantie_id'] = $participant->instanties->intersect($scan->instanties)->first()->id;
            $thisparticipant['instantie_title'] = $participant->instanties->intersect($scan->instanties)->first()->title;
            (count($participant->beheert->intersect([$scan])) > 0) ? $thisparticipant['beheerder'] = true : $thisparticipant['beheerder'] = false;
            $participants[$participant->id] = $thisparticipant;
        }
        return $participants;
    }

    public function getparticipant(Scan $scan, User $user)
    {
        return $user;
    }

    public function savenewparticipant(Request $request, Scan $scan)
    {
        if (! User::where('email', '=', $request->participant['email'])->get()->count())
        {
            $user = new User();
            $user->initial_pwd = str_random(8);
            $user->password = Hash::make($user->initial_pwd);
            $user->name_first = $request->participant['name_first'];
            $user->name_last = $request->participant['name_last'];
            $user->email = $request->participant['email'];
            $user->save();
        }
        $user = User::where('email', '=', $request->participant['email'])->first();
        if( ! $user->scans->intersect([$scan])->count() ) {
            $user->scans()->attach($scan);
        }
        if( $user->instanties->intersect($scan->instanties)->count() ) {
            $currentinstantie = $user->instanties->intersect($scan->instanties)->first();
            $newinstantie = Instantie::findOrFail($request->participant['instantie_id']);
            $user->instanties()->detach($currentinstantie);
            $user->instanties()->attach($newinstantie);
        }
        $instantie = Instantie::findOrFail($request->participant['instantie_id']);
        $user->instanties()->attach($instantie);
        return $request->all();
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

    public function indexinstantie(Scan $scan)
    {
        return Instantie::get();
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

    public function getInstruments()
    {
        $instruments = Instrument::with('themas')->get();
        return $instruments;
    }

    public function getProgrammas()
    {
        $programmas = Programma::with('themas')->get();
        return $programmas;
    }

    public function getPraktijkvoorbeelds()
    {
        $praktijkvoorbeelds = Praktijkvoorbeeld::with('themas')->get();
        return $praktijkvoorbeelds;
    }


}
