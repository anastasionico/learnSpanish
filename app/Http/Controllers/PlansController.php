<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class PlansController extends Controller
{
	public function index()
	{
        $plans = Plan::all();
        return view('admin/plans/index', compact('plans'));
	}

	public function show(Plan $plan, Request $request)
	{
	    return view('showplan', compact('plan'));
	}
}




