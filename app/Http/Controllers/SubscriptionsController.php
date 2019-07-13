<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class SubscriptionsController extends Controller
{

	public function create(Request $request, Plan $plan)
	{
		$plan = Plan::findOrFail($request->get('plan'));
		// dd($request->stripeToken);
        $request->user()
            ->newSubscription('main', $plan->stripe_plan)
            ->create($request->stripeToken);
        
        return redirect('/')->with('success', 'Your plan subscribed successfully, enjoy your learning');
	}
	

  	// public function create(Request $request, Plan $plan)
   //  {
   //  	dd($plan->stripe_plan);
   //      $plan = Plan::findOrFail($request->get('plan'));
        
   //      $request->user()
   //          ->newSubscription('main', $plan->stripe_plan)
   //          ->create($request->stripeToken);
        
   //      return redirect()->route('home')->with('success', 'Your plan subscribed successfully');
   //  }

}
