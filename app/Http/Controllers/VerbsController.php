<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verb;

class VerbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verbs = Verb::orderBy('importance', 'DESC')->get();

        return view('admin/verbs/index', compact("verbs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/verbs/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Verb::create(
            $request->validate([
                'verb_spa' => ['required','string','unique:verbs,verb_spa'],
                'verb_eng' => ['required','string'],
                'importance' => ['required','numeric'],
                'is_active' => [],
            ])
        );

        return redirect('admin/verbs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $verb = Verb::find($id);

        return view('admin/verbs/show', compact('verb'));        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $verb = Verb::find($id);

        
        return view('admin/verbs/edit', compact('verb'));
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
        $verb = Verb::findOrFail($id);        

        $verb->verb_spa = request('verb_spa');
        $verb->verb_eng = request('verb_eng');
        $verb->importance = request('importance');
        
        if ( ! $request->has('is_active')) {
            $verb->is_active = 0;      // Do something when checkbox isn't checked.
        } else {
            $verb->is_active = 1;    
        }
        
        $verb->save();

        return redirect()->action('VerbsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $verb = Verb::find($id);
        $verb->delete();
      
        return redirect('admin/verbs');
    }
}
