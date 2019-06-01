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
		return Tense::create(
            $request->validate([
                'verb_id' => ['required'],
                'sequence_number' => ['required','numeric'],
                'name' => ['required','string'],
                'is_free' => [],
            ])
        );
	}
}
