<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function quiz()
    {

    	$user = Auth::user();

    	if(is_null($user)) {
    		$this->playTesting();

    	}
    	if(isset($user->trial_ends_at) && $user->trial_ends_at > date('Y-m-d h:i:s')){
    		$this->playPaying();	
    	} else {
    		$this->playForFree();
    	}
        
        
    }

    public function playTesting()
    {
		$text = 'Testing the quiz';
		return view("test", compact('text'));


		// get this return view to work
    }

    public function playForFree()
    {
    	$text = 'Playing for free';	
    	return view('test', compact('text'));
    }

    public function playPaying()
    {
    	$text = 'Paying to Play';	
    	return view('test', compact('text'));
    }
}

