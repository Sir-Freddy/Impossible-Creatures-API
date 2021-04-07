<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpeciesController extends Controller
{
    function getAll(){
        return Species::all();
    }
    function getByID($id){
        return Species::findOrFail($id);
    }


    function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent1' => 'nullable',
            'parent2' => 'nullable',
            'inventor' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json(['Message' => 'Specie not created : The name is missing.'], 400);
        } else {
            $Specie = Species::CreateDTOtoObject($request);
            $Specie->save();

            return response($Specie, 201);
        }
    }

    function edit(Request $request, $id){
        $specie = Species::findOrFail($id);

        if ($specie){
            $specie = Species::UpdateDTOtoObject($request, $specie);
            $specie->save();
            return response()->json(['Message' => 'Specie has been updated.'], 200);
        } else {
            return response()->json(['Message' => 'Operation failed : Specie does not exist.'], 400);
        }
    }

    function delete($id){
        $specie = Species::findOrFail($id);

        if ($specie){
            $specie->delete();
            return response()->json(['Message' => 'Specie has been deleted.'], 200);
        } else {
            return response()->json(['Message' => 'Operation failed : Specie does not exist.'], 400);
        }
    }

}
