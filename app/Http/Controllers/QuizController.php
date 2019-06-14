<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class QuizController extends Controller
{
    public function quiz()
    {

    	$user = Auth::user();

    	// if user not logged in or user did not pay play for free
    	if(is_null($user) || !isset($user->trial_ends_at)) {
			return $this->playForFree();
		}
		// if user is logged in and he has paid play the paid method
    	if(isset($user->trial_ends_at) && $user->trial_ends_at > date('Y-m-d h:i:s')){
    		return $this->playPaying();	
    	} 
    }

    public function playForFree()
    {
    	$text = 'Free Mode';	
    	
    	$conjugations = DB::table('conjugations')
            ->join('tenses', 'tenses.id', '=', 'conjugations.tense_id')
            ->join('verbs', 'verbs.id', '=', 'tenses.verb_id')
            ->select('conjugations.*', 'tenses.name as tense', 'verbs.verb_eng as verb_eng', 'verbs.verb_spa as verb_spa')
			->where([
		    	['verbs.is_active', '=', '1'],
		    	['tenses.is_free', '=', '1'],
				['conjugations.is_active', '=', '1'],
		    	['conjugations.is_free', '=', '1'],
			])
			->inRandomOrder()
            ->get();

    	return view('quiz', compact('text', 'conjugations'));
    }

    public function playPaying()
    {
    	$text = 'Paying Mode';	
    	
    	$conjugations = DB::table('conjugations')
            ->join('tenses', 'tenses.id', '=', 'conjugations.tense_id')
            ->join('verbs', 'verbs.id', '=', 'tenses.verb_id')
            ->select('conjugations.*', 'tenses.name as tense', 'verbs.verb_eng as verb_eng', 'verbs.verb_spa as verb_spa')
			->where([
		    	['verbs.is_active', '=', '1'],
		    	['conjugations.is_active', '=', '1'],
		    ])
			->inRandomOrder()
            ->get();

    	return view('quiz', compact('text', 'conjugations'));
    }
}

