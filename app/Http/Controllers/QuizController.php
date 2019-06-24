<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Tense;
use App\SpaceRepetition;
use App\Conjugation;

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
        $tensesAvailableInPlatform = $this->getTensesAvailableInPlatform();
        $tensesRequestedByUser = $this->getTensesRequestedByUser($request, $tensesAvailableInPlatform);

        // If the user does not choose any tense return a flash error to the start-quiz page
        if(empty($tensesRequestedByUser)){
            return back()->with('error','You need to select at least one tense');
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

    private function getTensesAvailableInPlatform()
    {
        $tenses = DB::table('tenses')->distinct('name')->pluck('name');        

        foreach ($tenses as $tense) {
            $tensesAvailableInPlatform[] = $tense;
        }
        return $tensesAvailableInPlatform;
    }

    private function getTensesRequestedByUser(Request $request, Array $tensesAvailableInPlatform) 
    {
        $tensesRequested = $request->all();
        
        $tensesRequestedByUser = [];
        foreach ($tensesRequested as $tenseRequested) {
            if(in_array($tenseRequested, $tensesAvailableInPlatform)) {
                $tensesRequestedByUser[] = $tenseRequested;
            }
        }
        
        return $tensesRequestedByUser;     
    }

    /*
    * In this method I retrieve all the conjugations that can be seen by a standard free-user 
    * then I retrieve all the conjugation that the user has already played and are present into the space_repetition table
    * eventually I create an array that includes all the conjugations not yet seen by the user and
    * all the conjugations that the user has seen according to its own space_repetition algorithm
    */
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
        
        $conjugationsOrdered = $this->getConjugationRandomly($conjugations, $tensesRequestedByUser);
        
    	return view('quiz', compact('text', 'conjugationsOrdered','tensesRequestedByUser'));
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

        $conjugationsOrdered = $this->getConjugationInOrder($conjugations, $tensesRequestedByUser);

    	return view('quiz', compact('text', 'conjugationsOrdered'));
    }

    private function getConjugationRandomly($conjugations, $tensesRequestedByUser) 
    {
        
        // select all the conjugations the are into the space_repetition and follow the criteria choosen by the user
        $spaceRepetitionSentences = DB::table('space_repetition')
            ->join('conjugations', 'conjugations.id', '=', 'space_repetition.conjugation_id')
            ->join('tenses', 'tenses.id', '=', 'conjugations.tense_id')
            ->join('verbs', 'verbs.id', '=', 'tenses.verb_id')
            ->join('users', 'users.id', '=', 'space_repetition.user_id')
            ->select('space_repetition.*','conjugations.*', 'tenses.name as tense', 'verbs.verb_eng as verb_eng', 'verbs.verb_spa as verb_spa')
            ->where([
                ['verbs.is_active', '=', '1'],
                ['tenses.is_free', '=', '1'],
                ['conjugations.is_active', '=', '1'],
                ['conjugations.is_free', '=', '1'],
        
            ])
            ->whereIn('tenses.name', $tensesRequestedByUser)
            ->inRandomOrder()
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
        return $conjugationsOrdered;
    }

    private function getConjugationInOrder($conjugations, $tensesRequestedByUser) 
    {
        $userId = Auth::user()->id;
        // select all the conjugations the are into the space_repetition and follow the criteria choosen by the user
        $spaceRepetitionSentences = DB::table('space_repetition')
            ->join('conjugations', 'conjugations.id', '=', 'space_repetition.conjugation_id')
            ->join('tenses', 'tenses.id', '=', 'conjugations.tense_id')
            ->join('verbs', 'verbs.id', '=', 'tenses.verb_id')
            ->join('users', 'users.id', '=', 'space_repetition.user_id')
            ->select('space_repetition.*','conjugations.*', 'tenses.name as tense', 'verbs.verb_eng as verb_eng', 'verbs.verb_spa as verb_spa')
            ->where([
                ['verbs.is_active', '=', '1'],
                ['tenses.is_free', '=', '1'],
                ['conjugations.is_active', '=', '1'],
                ['conjugations.is_free', '=', '1'],
                ['users.id', '=', $userId],
            ])
            ->whereIn('tenses.name', $tensesRequestedByUser)
            ->orderBy('space_repetition.frequency', 'desc')
            ->orderBy('space_repetition.updated_at', 'asc')
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
        return $conjugationsOrdered;
    }

    public function valuateAnswer(Request $request) 
    {
        
        $conjugation = Conjugation::find($request->input('conjugationId'));
        $conjugationName = $conjugation->name;
        $conjugationId = $conjugation->id;
        
        // Check if answer is correct
        // Check Id of user
        // Check if aswer is in space repetiion

        // check whether the user is logged in,
        if (isset(Auth::user()->id)){
            // if is authorized take the id of the user
            $userId = Auth::user()->id;

            // take the id of the conjugation    
            // check whether this ids are already present in a record inside the space_repetition table
            $spaceRepetitionConjugation = DB::table('space_repetition')
                ->where('user_id', $userId)
                ->where('conjugation_id', $conjugationId)
                ->first();
            
            
            $dateNow = date_format(date_create(), 'Y-m-d H:i:s');

            if(strtolower($request->input('answer')) === strtolower($conjugationName)) {
                // if the answer exist inside space_repetition update the table by decreasing the frequency and set update_at as now() 

                if (isset($spaceRepetitionConjugation)) {
                    $queryDecreaseFrequency = DB::table('space_repetition')
                    ->where('id', $spaceRepetitionConjugation->id)
                    ->update([
                        'frequency' => ($spaceRepetitionConjugation->frequency > 1)? --$spaceRepetitionConjugation->frequency : 1,
                        'updated_at' => $dateNow
                    ]);

                } else {
                    // if the record that contains both id does not exist instert the record 
                    // add a frequency of 5 and set update_at as now()        
                    DB::table('space_repetition')->insert([
                        'user_id' => $userId, 
                        'conjugation_id' => $conjugationId,
                        'frequency' => 1,
                        'created_at' => $dateNow,
                        'updated_at' => $dateNow,
                    ]);
                }
            } else {
                // if the answer exist inside space_repetition update the table by decreasing the frequency and set update_at as now() 
                if (isset($spaceRepetitionConjugation)) {
                    $queryDecreaseFrequency = DB::table('space_repetition')
                    ->where('id', $spaceRepetitionConjugation->id)
                    ->update([
                        'frequency' => ($spaceRepetitionConjugation->frequency < 5)? ++$spaceRepetitionConjugation->frequency : 5,
                        'updated_at' => $dateNow
                    ]);

                } else {
                    // if the record that contains both id does not exist instert the record 
                    // add a frequency of 5 and set update_at as now()        
                    DB::table('space_repetition')->insert([
                        'user_id' => $userId, 
                        'conjugation_id' => $conjugationId,
                        'frequency' => 5,
                        'created_at' => $dateNow,
                        'updated_at' => $dateNow,
                    ]);
                }
            }
        } 
        
        return $this->quiz($request);
    }
}

