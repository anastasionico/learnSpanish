<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\User;

class SubscriptionsController extends Controller
{

	public function create(Request $request, Plan $plan)
	{
		$plan = Plan::findOrFail($request->get('plan'));
		
    // The first argument passed to the newSubscription method should be the name of the subscription
    // The second argument is the specific plan the user is subscribing to. This value should correspond to the plan's identifier in Stripe
    $request->user()
        ->newSubscription($plan->name, $plan->stripe_plan)
        ->create($request->stripeToken);
    
    return redirect('/')->with('success', 'Your plan subscribed successfully, enjoy your learning');
	}

  public function swap(Request $request, Plan $plan)
  {
    $user = $request->user();
    $plan = Plan::findOrFail($request->get('plan'));
    
    $currentUserPlan = \DB::table('subscriptions')->where('user_id', $user->id)->first();
    
    $user->subscription($currentUserPlan->name)->swap($plan->stripe_plan);

    \DB::table('subscriptions')->where('user_id', $user->id)->update(['name' => $plan->name]);
        
    
    return redirect('/')->with('success', 'You changed plan successfully, enjoy your learning');
  }

  public function destroy(Request $request)
  {
    $user = $request->user();
    $user->subscription($request->plan)->cancel();
    return redirect('/')->with('success', 'Your subscription plan has been deleted, we are sorry to see you go');
  }
}
