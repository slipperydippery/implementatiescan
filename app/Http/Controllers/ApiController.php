<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Thema;
use App\Question;
use App\Subactie;
use App\Instantie;
use App\Programma;
use App\Scanmodel;
use Carbon\Carbon;
use App\Instrument;
use App\Externaluser;
use App\Http\Requests;
use App\Verbeteractie;
use App\Subexternaluser;
use App\Praktijkvoorbeeld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\StoreParticipantRequest;
use App\Http\Requests\CreateAPIParticipantRequest;

class ApiController extends Controller
{

    public function indexscan()
    {
        return Scan::with('participants')->get();
    }

    public function updatescan (Request $request, Scan $scan)
    {
        $scan->testscan = $request->scan['testscan'];
        $scan->save();
        return $request->all();
    }

    public function indexuser()
    {
        return User::all();
    }

    public function verbeteracties( $thema)
    {
        $thema = Thema::findOrFail($thema);
        return $thema->verbeteracties;
    }

    public function indexsubactie(Verbeteractie $verbeteractie)
    {
        return $verbeteractie->subacties;
    }

    public function indexbetrokkene(Verbeteractie $verbeteractie)
    {
        return $verbeteractie->betrokkenen;
    }

    public function indexsubbetrokkene($subactie)
    {
        $subactie = Subactie::findOrFail($subactie);
        return $subactie->betrokkenen;
    }

    public function indexsubunbetrokkene($subactie)
    {
        $subactie = Subactie::findOrFail($subactie);
        // return $subactie->betrokkenen;
        // return $subactie->verbeteractie->scan->participants;
        return $subactie->verbeteractie->scan->participants->diff($subactie->betrokkenen);
    }

    public function savenewsubactie(Verbeteractie $verbeteractie)
    {
        $subactie = new Subactie();
        $subactie->datum = Carbon::now();
        $subactie->verbeteractie_id = $verbeteractie->id;
        $subactie->save();
        // return $subactie;
        // $subactie->verbeteractie->save($verbeteractie);
        // $verbeteractie->subacties->save($subactie);
        return $subactie->datum;
    }

    public function deletesubactie(Verbeteractie $verbeteractie, Subactie $subactie)
    {
        $subactie->delete();
    }

    public function addsubbetrokkene(Request $request, Subactie $subactie, User $user)
    {
        if(! $subactie->betrokkenen->intersect([$user])->count()) {
            $user->betrektSubacties()->save($subactie);
        }
    }

    public function removesubbetrokkene(Request $request, Subactie $subactie, User $user)
    {
        if($subactie->betrokkenen->intersect([$user])->count()) {
            $user->betrektSubacties()->detach($subactie);
        }
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
        $verbeteractie->werkactive = $request->actie['werkactive'];
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

    public function updatesubactie(Request $request, Subactie $subactie)
    {
        $subactie->update($request->subactie);
        // return $request->subactie;
        // $subactie->title = $request->title;
        // $subactie->save();
        return $request->all(); 
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

    public function indexscanparticipant(Scan $scan)
    {
        $participants = [];
        foreach($scan->participants as $participant)
        {
            $thisparticipant = [];
            $thisparticipant['id'] = $participant->id;
            $thisparticipant['name_first'] = $participant->name_first;
            $thisparticipant['name_last'] = $participant->name_last;
            $thisparticipant['email'] = $participant->email;
            $thisparticipant['last_online'] = $participant->last_online;
            $thisparticipant['diff_last_online'] = Carbon::parse($participant->last_online)->diffInMinutes(Carbon::now());
            $thisparticipant['instantie_id'] = $participant->instanties->intersect($scan->instanties)->first()->id;
            $thisparticipant['instantiemodel_id'] = $participant->instanties->intersect($scan->instanties)->first()->instantiemodel->id;
            $thisparticipant['instantie_title'] = $participant->instanties->intersect($scan->instanties)->first()->title;
            (count($participant->beheert->intersect([$scan])) > 0) ? $thisparticipant['beheerder'] = true : $thisparticipant['beheerder'] = false;
            $participants[] = $thisparticipant;
        }
        return $participants;
    }

    public function getparticipant(Scan $scan, User $user)
    {
        return $user;
    }

    public function indexexternaluser(Verbeteractie $verbeteractie)
    {
        return $verbeteractie->externalusers;
    }

    public function indexsubexternaluser(Subactie $subactie)
    {
        return $subactie->externalusers;
    }

    public function savenewexternaluser(Request $request, Verbeteractie $verbeteractie)
    {
        $externaluser = new Externaluser();
        $externaluser->name = $request->externaluser;
        $verbeteractie->externalusers()->save($externaluser);
        return $verbeteractie;
    }

    public function savenewsubexternaluser(Request $request, Subactie $subactie)
    {
        $subexternaluser = new Subexternaluser();
        // return $request->all();
        $subexternaluser->name = $request->externaluser;
        $subactie->externalusers()->save($subexternaluser);
        // $subexternaluser->subactie()->save($subactie);
        return $subactie;
    }

    public function removeexternaluser($verbeteractie, Externaluser $externaluser)
    {
        $externaluser->delete();
        return $externaluser;
    }

    public function removesubexternaluser($subactie, Subexternaluser $subexternaluser)
    {
        $subexternaluser->delete();
        return ('done');
    }

    public function savenewparticipant(CreateAPIParticipantRequest $request, Scan $scan)
    {
        if (! User::where('email', '=', $request->participant['email'])->get()->count())
        {
            User::register([
                'name_first' => $request->participant['name_first'],
                'name_last' => $request->participant['name_last'],
                'email' => $request->participant['email'],
            ]);
        }
        $user = User::where('email', '=', $request->participant['email'])->first();
        if(! $user->scans->intersect([$scan])->count()) {
            $user->scans()->attach($scan);
        }
        if($user->instanties->intersect($scan->instanties)->count()) {
            $currentinstantie = $user->instanties->intersect($scan->instanties)->first();
            $user->instanties()->detach($currentinstantie);
        }
        $instantie = Instantie::findOrFail($request->participant['instantie_id']);
        $user->instanties()->attach($instantie);
        return $user;
    }

    public function updateparticipant(Request $request, Scan $scan, User $user)
    {
        $user->name_first = $request->participant['name_first'];
        $user->name_last = $request->participant['name_last'];
        $user->email = $request->participant['email'];
        $currentinstantie = $user->instanties->intersect($scan->instanties)->first();
        $newinstantie = Instantie::findOrFail($request->participant['instantie_id']);
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
        return $scan->instanties;
        // return Instantie::get();
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

    public function instantiesveld()
    {
        $instantiesveld = [];
        foreach(Scan::findOrFail(1)->scanmodel->instantiemodels as $instantiemodel)
        {
            $instantie = [];
            $instantie['id'] = $instantiemodel->id;
            $instantie['title'] = $instantiemodel->title;
            $instantie['allparticipants'] = 0;
            $instantie['activeparticipants'] = 0;
            foreach($instantiemodel->instanties as $thisinstantie)
            {
                $instantie['allparticipants'] += $thisinstantie->participants->count();
                if(! $thisinstantie->scan->testscan)
                {
                    $instantie['activeparticipants'] += $thisinstantie->participants->count();
                }
            }
            $instantiesveld[$instantiemodel->id] = $instantie;
        }
        return $instantiesveld;
    }

    public function criteria()
    {
        $criteria = [];
        foreach(Question::all() as $question)
        {
            $thiscriterium = [];
            $thiscriterium['title'] = $question->title;
            $thiscriterium['allcount'] = 0;
            $thiscriterium['activecount'] = 0;
            $thiscriterium['themaid'] = $question->thema->first()->id;
            $thiscriterium['thematitle'] = $question->thema->first()->title;
            $thiscriterium['averagescore'] = 0;
            $thiscriterium['subacties'] = 0;
            $criteria[$question->id] = $thiscriterium;
        }
        foreach(Verbeteractie::all() as $actie)
        {
            if(! $actie->scan->testscan)
            {
                if($actie->active)
                {
                    $criteria[$actie->question_id]['activecount'] += 1;
                }

                $totalscore = 0;
                $totalanswers = 0;
                foreach($actie->question->answers as $answer)
                {
                    $totalanswers++;
                    $totalscore += $answer->value;
                }
                if($totalanswers > 0)
                {
                    $criteria[$actie->question_id]['averagescore'] = $totalscore / $totalanswers;
                }
                foreach($actie->subacties as $subactie)
                {
                    $criteria[$actie->question_id]['subacties'] += 1;
                }
            }
        }
        return $criteria;
    }

}
