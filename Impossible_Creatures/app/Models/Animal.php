<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Animal extends Model
{
    use HasFactory;

    public static function CreateDTOtoObject(Request $request){
        $animal = new Animal();

        $animal ->name = $request->name;
        $animal ->species = $request->species;
        $animal ->inventor = $request->inventor;
        $animal ->owner = $request->owner;

        return $animal;
    }

    public static function UpdateDTOtoObject(Request $request, $animal){

        if ($animal->name){$animal ->name = $request->name;}
        if ($animal->species){$animal ->species = $request->species;}
        if ($animal->inventor){$animal ->inventor = $request->inventor;}
        if ($animal->owner){$animal ->owner = $request->owner;}

        return $animal;
    }
}
