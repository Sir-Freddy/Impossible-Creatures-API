<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    public static function getPasswordByUsername($username){
        $user = DB::table('users')->where('username', $username)->first();
        return $user->password;
    }

    public static function CreateDTOtoObject(Request $request){
        $user = new User();

        $user ->username = $request->username;
        $user ->password = $request->password;
        $user ->money = $request->money;
        $user ->points = $request->points;
        $user ->animals = $request->animals;
        $user ->species = $request->species;

        return $user;
    }

    public static function UpdateDTOtoObject(Request $request, $user){

        if ($user->username){$user ->username = $request->username;}
        if ($user->password){$user ->password = $request->password;}
        if ($user->money){$user ->money = $request->money;}
        if ($user->points){$user ->points = $request->points;}
        if ($user->animals){$user ->animals = $request->animals;}
        if ($user->species){$user ->species = $request->species;}

        return $user;
    }

    public static function GetAnByUsID($id){
        $user = DB::table('users')->where('id', $id)->first();
        return $user->animals;
    }

    public static function GetSpByUsID($id){
        $user = DB::table('users')->where('id', $id)->first();
        return $user->species;
    }

    public static function GetUsByAnID($id){
        $animal = DB::table('users')->where('animals');//pas fini
    }
}
