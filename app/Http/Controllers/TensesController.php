<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tense;
use App\Verb;

class TensesController extends Controller
{
	public function create(Verb $verb)
	{
		return view('admin/tenses/create', compact("verb"));
	}

	public function store(Request $request)
	{
        $verb = Verb::find($request->verb_id);

		$verb->addTense($request);
	
		return view("admin/verbs/show", compact('verb'));
	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tense = Tense::find($request->tense);
        $tense->delete();
      
        return redirect("admin/verbs/$request->verb");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Verb $verb, Tense $tense)
    {
        
        $tense = Tense::find($tense)->first();;
        $verb = Verb::find($verb)->first();
        
        return view("admin/tenses/edit", compact('tense', 'verb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tense $tense)
    {
        $is_free = (request()->has('is_free'))? 1 : 0;
        
        $tense->update([
   			'name' => request('name'),
   			'is_free' => $is_free
       	]);

        return redirect("admin/verbs/" . request('verb_id'));
   	}
}
