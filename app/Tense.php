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

	
}
