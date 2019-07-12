<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use App\spaceRepetition;


class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'is_marketable', 'dob', 'sex', 'country', 'first_language'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function frequency()
    {
        return $this->hasMany(SpaceRepetition::class);
    }

    public function updateUser($request)
    {
        $this->name = request('name');
        $this->email = request('email');
        
        if ( ! $request->has('is_admin')) {
            $this->is_admin = 0;      // Do something when checkbox isn't checked.
        } else {
            $this->is_admin = request('is_admin');    
        }
        if ( ! $request->has('is_marketable')) {
            $this->is_marketable = 0;      // Do something when checkbox isn't checked.
        } else {
            $this->is_marketable = request('is_marketable');    
        }        
        if ($request->has('country')) {
            $this->country = request('country');    
        }        
        if ($request->has('first_language')) {
            $this->first_language = request('first_language');    
        }        
        if ($request->has('sex')) {
            $this->sex = request('sex');    
        }        
        $this->dob = request('dob');
        
        if($this->save()) {
            return true;
        }
    }

    public function updateUserPassword($request)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        return self::update([
            'password' => bcrypt(request('password')),
        ]);
        
        // if($this->save()) {
        //     return true;
        // }

    }

}
