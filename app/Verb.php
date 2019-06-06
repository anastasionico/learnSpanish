<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verb extends Model
{
    protected $fillable = [
        'verb_spa', 'verb_eng', 'importance', 'is_active'
    ];

	public function tenses ()    
	{
		return $this->hasMany(Tense::class);
	}

	public function addTense($request)
	{
        $is_free = (request()->has('is_free'))? 1 : 0;

		$request->validate([
            'verb_id' => ['required'],
            'sequence_number' => ['required','numeric'],
            'name' => ['required','string'],
            'is_free' => [],
        ]);
        
        return Tense::create([
            'verb_id' => request('verb_id'),
            'sequence_number' => request('sequence_number'),
            'name' => request('name'),
            'is_free' => $is_free,
        ]);
	}
}
