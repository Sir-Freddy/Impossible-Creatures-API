<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Species extends Model
{
    use HasFactory;

    public static function CreateDTOtoObject(Request $request){
        $Specie = new Species();

        $Specie ->name = $request->name;
        $Specie ->parent1 = $request->parent1;
        $Specie ->parent2 = $request->parent2;
        $Specie ->inventor = $request->inventor;

        return $Specie;
    }

    public static function UpdateDTOtoObject(Request $request, $specie){

        if ($specie->name){$specie ->name = $request->name;}
        if ($specie->parent1){$specie ->parent1 = $request->parent1;}
        if ($specie->parent2){$specie ->parent2 = $request->parent2;}
        if ($specie->inventor){$specie ->inventor = $request->inventor;}

        return $specie;
    }

}
