<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SpaceRepetition extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'space_repetition';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function sentence()
    {
    	return $this->belongsTo('App\Conjugation', 'conjugation_id');
    }
}
