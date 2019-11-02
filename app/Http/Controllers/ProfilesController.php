<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfilesController extends Controller
{
	public function edit()
	{
		$user = Auth::user();
		return view('profile', compact('user'));
	}

	public function update(Request $request)
	{
		$user = Auth::user();
		
		$response = $user->updateUser($request);

		return redirect()->action('ProfilesController@edit');
	}

	public function editpassword()
	{
		$user = Auth::user();
		return view('editpassword', compact('user'));
	}

	public function updatepassword(Request $request)
	{
		
		$user = User::find(Auth::user())->first();
		
		$response = $user->updateUserPassword($request);

		if(!$response){
			return back()->with('error','Problem occurred while changing password');
		}
		
		return redirect()->action('ProfilesController@edit')->with('success','Password changed!');
	}
}
