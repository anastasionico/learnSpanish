<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conjugation extends Model
{
    protected $guarded = [];

    public function tense()
    {
    	$this->belongsTo(Tense::class);
    }
}