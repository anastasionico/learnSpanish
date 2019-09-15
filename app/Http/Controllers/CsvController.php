<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verb;
use App\Tense;
use App\Conjugation;

class CsvController extends Controller
{
	public function exportCsv() {
        $file = public_path(). "/file/template.csv";
        return response()->download($file);
    }

    public function importCsv() {
        return view('admin/verbs/importcsv');
    }

    public function importVerb(Request $request, $filename = '', $delimiter = ',')
    {
        $filename = $request->file('csv_file')->getPathName();

        $header = null;
        $data = array();
        $i = 1;
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {

                if($i === 1) {
                    $verb_id = $this->importVerbFromCsv($row);
                } else {
                	$tense_id = $this->importTenceFromCsv($verb_id, $row[0]);
                	$conjugation_id = $this->importConjugationFromCsv($tense_id, $row);
                } 

                $data[] = $row;
                $i++;
            }
            
            fclose($handle);
        }

    	return redirect("admin/verbs/$verb_id");
	}

    public function importVerbFromCsv(array $row) :int
    {
      	// create a new request that will be filled with the first row of the template, validate and saved
        $newVerb = new \Illuminate\Http\Request();        
        $newVerb->replace([
            'verb_spa' => $row[0],
            'verb_eng' => $row[1],
            'importance' => (int) $row[2],
            'is_active' => $row[3],
        ]);

        $newVerb->validate([
            'verb_spa' => ['required','string','unique:verbs,verb_spa'],
            'verb_eng' => ['required','string'],
            'importance' => ['required','numeric'],
        ]);
    
        $is_active = ($newVerb->is_active === 'true' || $newVerb->is_active === 'TRUE')? 1 : 0;

        $verbCreated = Verb::create([
            'verb_spa' => $newVerb->verb_spa,
            'verb_eng' => $newVerb->verb_eng,
            'importance' => $newVerb->importance,
            'is_active' => $is_active,
        ]);

        // the value returned is the id of the verb that will be used as foreign key to save tence and conjugation
        if(is_integer($verbCreated->id)){
            return $verbCreated->id;
        }
    } 

    public function importTenceFromCsv(int $verb_id, string $tense) :int
    {
    	// check it the tense already exists for this verb
    	$tenseExist = Tense::where('name', $tense)
           ->where('verb_id', $verb_id)
           ->first();

	   	// If the tense for the verb the user is saving already exists return the tense
      	if(!is_null($tenseExist)){
			$lastTense = Tense::orderBy('id', 'desc')->first();
      		
      		return $lastTense->id;
      	}

      	// If instead the tense related with the new verb do not exist create and return the id that needed to be saved as a foreing key into the conjugations
      	$newTense = new \Illuminate\Http\Request();  
		$newTense->replace([
            'verb_id' => $verb_id,
            'sequence_number' => 1,
            'name' => $tense,
            'is_free' => 1,
        ]);

		$newTense->validate([
            'verb_id' => ['required'],
            'sequence_number' => ['required','numeric'],
            'name' => ['required','string'],
            'is_free' => ['numeric'],
        ]);
        
        $tenseCreated = Tense::create([
            'verb_id' => $newTense->verb_id,
            'sequence_number' => $newTense->sequence_number,
            'name' => $newTense->name,
            'is_free' => $newTense->is_free,
        ]);

      	
        if(is_integer($tenseCreated->id)){
            return $tenseCreated->id;
        }
    } 

    public function importConjugationFromCsv(int $tense_id, array $row) :int
    {
    	$is_irregular = ($row[3] === 'true'|| $row[3] === 'TRUE')? 1 : 0 ;
      	$newConjugation = new \Illuminate\Http\Request();  
		$newConjugation->replace([
            'tense_id' => $tense_id,
            'pronoun' => mb_convert_encoding($row[1], "UTF-8"),
            'name' => mb_convert_encoding($row[2], "UTF-8"),
            'is_active' => 0,
            'is_free' => 2,
            'is_irregular' => $is_irregular,
		]);

		$newConjugation->validate([
            'tense_id' => ['required'],
            'pronoun' => ['string'],
            'name' => ['required','string'],
            'is_free' => ['required','int'],
        ]);

           

        $conjugationCreated =  Conjugation::create([
            'tense_id' => $newConjugation->tense_id,
            'pronoun' => $newConjugation->pronoun,
            'name' => $newConjugation->name,
            'is_active' => $newConjugation->is_active,
            'is_free' => $newConjugation->is_free,
            'is_irregular' => $newConjugation->is_irregular,
        ]);
        
        if(is_integer($conjugationCreated->id)){
            return $conjugationCreated->id;
        }
    } 
}
