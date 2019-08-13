<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tense;
use App\Verb;
use App\Conjugation;

class ConjugationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($verb_id, $tense_id)
    {
        $verb = Verb::find($verb_id);
        $tense = Tense::find($tense_id);
        
        return view('admin/conjugations/create', compact('verb','tense'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tense = Tense::find($request->tense_id);
        $verb = Verb::find($request->verb_id);
        
        $tense->addConjugation($request);
    
        return view("admin/verbs/show", compact('verb'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Conjugation $conjugation)
    {
        return view('admin/conjugations/edit', compact('conjugation'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conjugation $conjugation)
    {
        $conjugation->pronoun = request('pronoun');
        $conjugation->name = request('name');
        $conjugation->is_active = (request()->has('is_active'))? 1 : 0;
        $conjugation->is_free = request('is_free');
        $conjugation->is_irregular = (request()->has('is_irregular'))? 1 : 0;
        $conjugation->save();

        $tense = Tense::findOrFail($conjugation->tense_id);                
        $verb = Verb::findOrFail($tense->verb_id);                
        
        return view('admin/verbs/show', compact('verb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Conjugation $conjugation)
    {
        $conjugation->delete();
        
        $verb = Verb::find($request->verb);

        return view("admin/verbs/show", compact('verb'));
    }

    public function setRegularity(Conjugation $conjugation)
    {
        $conjugation->is_irregular = ($conjugation->is_irregular === 0)? 1 : 0;
        $conjugation->save();
        return redirect()->back();
    }

    public function setAvailability(Conjugation $conjugation)
    {
        $conjugation->is_active = ($conjugation->is_active === 0)? 1 : 0;
        $conjugation->save();
        return redirect()->back();
    }

    public function setFormat(Conjugation $conjugation)
    {
        if($conjugation->is_free === 0) {
            $conjugation->is_free = 1;
        } else if($conjugation->is_free === 1) {
            $conjugation->is_free = 2;
        } else if($conjugation->is_free === 2) {
            $conjugation->is_free = 0;
        }
        $conjugation->save();
        return redirect()->back();
    }

    public function setRegularityAll(Tense $tense, $value)
    {
        foreach ($tense->conjugations as $conjugation) {
            $conjugation->is_irregular = $value;
            $conjugation->save();
        }
        
        return redirect()->back();
    }
    public function setAvailabilityAll(Tense $tense, $value)
    {
        foreach ($tense->conjugations as $conjugation) {
            $conjugation->is_active = $value;
            $conjugation->save();
        }
        
        return redirect()->back();
    }

    public function setFormatAll(Tense $tense, $value)
    {
        foreach ($tense->conjugations as $conjugation) {
            $conjugation->is_free = $value;
            $conjugation->save();
        }
        
        return redirect()->back();
    }
}
