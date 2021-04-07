<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    function getAll(){
        return User::all();
    }
    function getByID($id){
        return User::findOrFail($id);
    }

    function auth(Request $request){ //Connexion
        $username = $request->username;
        $password = $request->password;

        if (User::getPasswordByUsername($username) == $password){
            return response()->json(['message' => 'Welcome Back! :)'], 200);
        } else {
            return response()->json(['message' => 'Wrong password... :('], 400);
        }
    }

    function register(Request $request){ //Inscription
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'money' => 'nullable',
            'points' => 'nullable',
            'animals' => 'nullable',
            'species' => 'nullable'

        ]);
        if ($validator->fails()){
            return response()->json(['Message' => 'Account not created : A field is missing.'], 400);
        } else {
            $user = User::CreateDTOtoObject($request);
            $user->save();

            return response($user, 201);
        }
    }

    function edit(Request $request, $id){ //edit un user
        $user = User::findOrFail($id);

        if ($user){
            $user = User::UpdateDTOtoObject($request, $user);
            $user->save();
            return response()->json(['Message' => 'User has been updated.'], 200);
        } else {
            return response()->json(['Message' => 'Operation failed : User does not exist.'], 400);
        }
    }

    function delete($id){
        $user = User::findOrFail($id);

        if ($user){
            $user->delete();
            return response()->json(['Message' => 'User has been deleted.'], 200);
        } else {
            return response()->json(['Message' => 'Operation failed : User does not exist.'], 400);
        }
    }

    // la liste des animaux d'un utilisateur donné
    // Route::get('/user_has_animals/{id}', [UserController::class, 'getAnimalByUserID']);
    function getAnimalByUserID($id){
        return User::GetAnByUsID($id);
    }

    function getSpeciesByUserID($id){
        return User::GetSpByUsID($id);
    }

    function getUserByAnimalID($id){
        return User::GetUsByAnID($id);
    }

}
