<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Tense;
use App\SpaceRepetition;

class QuizController extends Controller
{
    /**
    * The start method returns all the tense available from the database
    * And show them into a form with switcher that the user can select
    */
    public function start () {
    
        $tenses = DB::table('tenses')->distinct('name')->pluck('name');
    
        return view('start-quiz', compact('tenses'));

    }

    /**
    * This method compare all the tense available in the application 
    * with the tenses requested by the user
    * then call the play function according to the user type
    */
    public function quiz(Request $request)
    {   
        $tenses = DB::table('tenses')->distinct('name')->pluck('name');        
        foreach ($tenses as $tense) {
            $tenseAvailableInPlatform[] = $tense;
        }
        
        $tensesRequested = $request->all();
        
        $tensesRequestedByUser = [];
        foreach ($tensesRequested as $tenseRequested) {
            if(in_array($tenseRequested, $tenseAvailableInPlatform)) {
                $tensesRequestedByUser[] = $tenseRequested;
            }
        }
        
    	$user = Auth::user();

    	// if user not logged in or user did not pay play for free
    	if(is_null($user) || !isset($user->trial_ends_at)) {
			return $this->playForFree($tensesRequestedByUser);
		}
		// if user is logged in and he has paid play the paid method
    	if(isset($user->trial_ends_at) && $user->trial_ends_at > date('Y-m-d h:i:s')){
    		return $this->playPaying($tensesRequestedByUser);	
    	} 
    }

    public function playForFree($tensesRequestedByUser)
    {
    	$text = 'Free Mode';	
    	// get all the conjugations that belong to the category choosen by the user
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
            ->whereIn('tenses.name', $tensesRequestedByUser)
			->inRandomOrder()
            ->get();

        
        // select all the conjugations the are into the space_repetition and follow the criteria choosen by the user
        $spaceRepetitionSentences = DB::table('space_repetition')
            ->join('conjugations', 'conjugations.id', '=', 'space_repetition.conjugation_id')
            ->join('tenses', 'tenses.id', '=', 'conjugations.tense_id')
            ->join('verbs', 'verbs.id', '=', 'tenses.verb_id')
            ->select('space_repetition.*','conjugations.*', 'tenses.name as tense', 'verbs.verb_eng as verb_eng', 'verbs.verb_spa as verb_spa')
            ->where([
                ['verbs.is_active', '=', '1'],
                ['tenses.is_free', '=', '1'],
                ['conjugations.is_active', '=', '1'],
                ['conjugations.is_free', '=', '1'],
            ])
            ->whereIn('tenses.name', $tensesRequestedByUser)
            ->orderBy('space_repetition.frequency', 'desc')
            ->orderBy('space_repetition.updated_at', 'desc')
            ->get();
        
        // creating an array to be evaluate inside in_array in order to get all the sentences not studied yet by the user
        $sentenceStudiedByUser = [];
        foreach ($spaceRepetitionSentences as $spaceRepetitionSentence) {
            $sentenceStudiedByUser[] = $spaceRepetitionSentence->conjugation_id;
        }
        
        
        // I need to evaluate all the conjugation that follow the criteria of the user and compare them with the conjugations already studied and present inside $sentenceStudiedByUser
        // if the sentence in not studied yet need to be shown first in the array
        $conjugationsOrdered = [];
        foreach($conjugations as $conjugation) {
            if(!in_array($conjugation->id, $sentenceStudiedByUser)) {
                $conjugationsOrdered[] = $conjugation;
            }

        }
        
        
        // then I need to insert all the conjugation that are already inside the spacerepetition ordered by frequency and updated_at
        foreach ($spaceRepetitionSentences as $spaceRepetitionSentence) {
            $conjugationsOrdered[] = $spaceRepetitionSentence;
        }
        

    	return view('quiz', compact('text', 'conjugationsOrdered'));
    }

    public function playPaying($tensesRequestedByUser)
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
            ->whereIn('tenses.name', $tensesRequestedByUser)
			->inRandomOrder()
            ->get();

    	return view('quiz', compact('text', 'conjugations'));
    }
}

