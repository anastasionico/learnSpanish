<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Plan;


class PlansController extends Controller
{
	public function index()
	{
        $plans = Plan::all();
        return view('admin/plans/index', compact('plans'));
	}

	public function edit(Plan $plan)
    {
    	return view('admin/plans/edit', compact('plan'));
    }	

	public function create()
	{
	    return view('admin/plans/create');
	}

	public function store(Request $request)
	{
		$request->validate([
            'name' => ['required','string','unique:plans,name'],
            'identifier' => ['required','string','unique:plans,stripe_plan'],
            'cost' => ['required','numeric','min:0'],
            'description' => ['string'],
        ]);
    	
        Plan::create([
            'name' => ucfirst(request('name')),
            'slug' => str_slug(request('name'), '-'),
            'stripe_plan' => request('identifier'),
            'cost' => request('cost'),
            'description' => request('description'),
        ]);

        return redirect('admin/plans');
	}



	public function update(Request $request, Plan $plan)
	{

		// $plan = Plan::findOrFail($plan);        
		
        $plan->name = ucfirst(request('name'));
        $plan->slug = str_slug(request('name'), '-');
        $plan->stripe_plan = request('identifier');
        $plan->cost = request('cost');
        $plan->description = request('description');
        
        $plan->save();

        return redirect()->action('PlansController@index');
	}
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        
     	return redirect()->action('PlansController@index');
    }



	public function show(Plan $plan, Request $request)
	{
	    return view('showplan', compact('plan'));
	}

    public function swap(Plan $plan, Request $request)
    {
        return view('swapplan', compact('plan'));
    }

	public function pricing()
	{
        $plans = Plan::all();

        $user = Auth::user();

        // Check if the user is already subscribed with some plan so I can show the swap button instead of sign-in button
        foreach ($plans as $plan) {
            if($user->subscribed($plan->name)){
                $userSubscribed = true;
            }
        }
        
		return view('pricing', compact('plans','user', 'userSubscribed'));
	}
	
}




