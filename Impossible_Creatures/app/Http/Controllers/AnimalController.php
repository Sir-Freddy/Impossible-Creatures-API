<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnimalController extends Controller
{
    function getAll(){
        return Animal::all();
    }
    function getByID($id){
        return Animal::findOrFail($id);
    }


    function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'species' => 'required',
            'inventor' => 'required',
            'owner' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['Message' => 'Animal not created : The name is missing.'], 400);
        } else {
            $animal = Animal::CreateDTOtoObject($request);
            $animal->save();

            return response($animal, 201);
        }
    }

    function edit(Request $request, $id){
        $animal = Animal::findOrFail($id);

        if ($animal){
            $animal = Animal::UpdateDTOtoObject($request, $animal);
            $animal->save();
            return response()->json(['Message' => 'Animal has been updated.'], 200);
        } else {
            return response()->json(['Message' => 'Operation failed : Animal does not exist.'], 400);
        }
    }

    function delete($id){
        $animal = Animal::findOrFail($id);

        if ($animal){
            $animal->delete();
            return response()->json(['Message' => 'Animal has been deleted.'], 200);
        } else {
            return response()->json(['Message' => 'Operation failed : Animal does not exist.'], 400);
        }
    }
}
