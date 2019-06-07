<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SpaceRepetition;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin/users/index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);        

        return view('admin/users/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);        

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        if ( ! $request->has('is_admin')) {
            $user->is_admin = 0;      // Do something when checkbox isn't checked.
        } else {
            $user->is_admin = request('is_admin');    
        }
        if ( ! $request->has('is_marketable')) {
            $user->is_marketable = 0;      // Do something when checkbox isn't checked.
        } else {
            $user->is_marketable = request('is_marketable');    
        }        
        if ($request->has('country')) {
            $user->country = request('country');    
        }        
        if ($request->has('first_language')) {
            $user->first_language = request('first_language');    
        }        
        if ($request->has('sex')) {
            $user->sex = request('sex');    
        }        
        $user->dob = request('dob');
        $user->save();

        return redirect()->action('UsersController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect('/admin/users');
    }

    public function conjugationChart(User $user)
    {
        $conjugations = SpaceRepetition::where('user_id', '=', $user->id)->get();
        // dd($conjugations);
        return view('admin/users/conjugationchart', compact('conjugations','user'));
    }
}
