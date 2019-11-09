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
        if ($request->has('name') && request('name') !== null) {
            $this->name = request('name');    
        }

        if ($request->has('email') && request('email') !== null) {
            $this->email = request('email');    
        }
        
        if ($request->has('password') && request('password') !== null) {
            $this->password = Hash::make(request('password'));
        }

        if ( ! $request->has('is_admin')) {
            $this->is_admin = 0;      // Do something when checkbox isn't checked.
        } else {
            $this->is_admin = request('is_admin');    
        }

        if ($request->has('dob') && request('dob') !== null) {
            $this->dob = request('dob');    
        }

        if ($request->has('sex') && request('sex') !== null) {
            $this->sex = request('sex');    
        }        
        
        if ($request->has('country') && request('country') !== null) {
            $this->country = request('country');    
        }        

        if ($request->has('first_language') && request('first_language') !== null) {
            $this->first_language = request('first_language');
        }

        if ($request->has('stripe_id') && request('stripe_id') !== null) {
            $this->stripe_id = request('stripe_id');    
        }

        if ($request->has('card_brand') && request('card_brand') !== null) {
            $this->card_brand = request('card_brand');    
        }

        if ($request->has('card_last_four') && request('card_last_four') !== null) {
            $this->card_last_four = request('card_last_four');
        }

        if ($request->has('trial_ends_at') && request('trial_ends_at') !== null) {
            $this->trial_ends_at = request('trial_ends_at');    
        }

        if ( ! $request->has('is_marketable')) {
            $this->is_marketable = 0;      // Do something when checkbox isn't checked.
        } else {
            $this->is_marketable = request('is_marketable');    
        }        

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
