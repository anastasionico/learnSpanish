<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tense extends Model
{
    
    protected $guarded = [];

 
 	public function verb()
   	{
   		return $this->belongsTo(Verb::class);
	}   

	public function conjugations()
	{
		return $this->hasMany(Conjugation::class);
	}

	public function addConjugation($request)
	{
        $is_active = (request()->has('is_active'))? 1 : 0;
        $is_irregular = (request()->has('is_irregular'))? 1 : 0;

        $request->validate([
            'tense_id' => ['required'],
            'pronoun' => ['required','string'],
            'name' => ['required','string'],
            'is_free' => ['required','int'],
        ]);

           
        return Conjugation::create([
            'tense_id' => request('tense_id'),
            'pronoun' => request('pronoun'),
            'name' => request('name'),
            'is_active' => $is_active,
            'is_free' => request('is_free'),
            'is_irregular' => $is_irregular,
        ]);

	}
	
}
