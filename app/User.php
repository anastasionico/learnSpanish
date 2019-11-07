<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use App\spaceRepetition;
use Illuminate\Support\Facades\Hash;

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

    public function updateUser(\Illuminate\Http\Request $request)
    {

        $this->name = request('name');
        $this->email = request('email');
        
        if ($request->has('password')) {
            $this->password = Hash::make(request('password'));
        }

        if ($request->has('dob')) {
            $this->dob = request('dob');    
        }

        if ($request->has('card_brand')) {
            $this->card_brand = request('card_brand');    
        }

        if ($request->has('card_last_four')) {
            $this->card_last_four = request('card_last_four');    
        }

        if ($request->has('trial_ends_at')) {
            $this->trial_ends_at = request('trial_ends_at');    
        }

        if ($request->has('dob')) {
            $this->dob = request('dob');    
        }

        if ($request->has('stripe_id')) {
            $this->stripe_id = request('stripe_id');    
        }

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

    public function authIsAdmin(int $user) :bool {
        $userRole = User::select('is_admin')
            ->where('id', $user)
            ->get()
            ->first();

        return $userRole->is_admin;
    }
}
