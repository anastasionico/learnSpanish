<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function quiz()
    {
    	/*
			I need to check if the user has paid
			
			I need to select all the active conjugations that 
			belongs to active tenses that 
			belongs to active verbs
    	*/
    	

    	return view('quiz2');
    }
}
