<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\ANimalController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//   exemple de requète : http://127.0.0.1:8000/api   -> voir la vue de base
Route::get('/', function () {
    return view('welcome');
});

// Première partie du sujet //

//user
Route::get('/users', [UserController::class, 'getAll']); //liste des users  OK
Route::get('/users/{id}', [UserController::class, 'getByID']); //récup un user    OK
Route::post('/auth', [UserController::class, 'auth']); //se connecter   OK
Route::post('/register', [UserController::class, 'register']); //créer un user  OK
Route::put('/users/{id}', [UserController::class, 'edit']); //modifier un user  OK
Route::delete('/users/{id}', [UserController::class, 'delete']); //delete a user    OK

//species
Route::post('/species', [SpeciesController::class, 'create']); //Créer une espèce   OK
Route::put('/species/{id}', [SpeciesController::class, 'edit']); //Modifier une espèce  OK
Route::delete('/species/{id}', [SpeciesController::class, 'delete']); //Supprimer une espèce    OK
Route::get('/species', [SpeciesController::class, 'getAll']); //Récupérer la liste des espèces  OK
Route::get('/species/{id}', [SpeciesController::class, 'getByID']); //récup une espèce  OK

//animal
Route::post('/animals', [AnimalController::class, 'create']); //Créer un animal OK
Route::put('/animals/{id}', [AnimalController::class, 'edit']); //Modifier un animal    OK
Route::delete('/animals/{id}', [AnimalController::class, 'delete']); //Supprimer un animal  OK
Route::get('/animals', [AnimalController::class, 'getAll']); //Récupérer la liste des animaux   OK
Route::get('/animals/{id}', [AnimalController::class, 'getByID']); //récup un animal    OK

// Deuxième partie du sujet //

Route::get('/user_has_animals/{id}', [UserController::class, 'getAnimalByUserID']);
// la liste des animaux d'un utilisateur donné  OK

Route::get('/user_has_species/{id}', [UserController::class, 'getSpeciesByUserID']);
// la liste des espèces créées par un utilisateur donné OK

Route::get('/animal_has_owners/{id}', [UserController::class, 'getUserByAnimalID']);
// la liste des utilisateurs qui ont possédé un animal donné

Route::get('/top/{x}', [UserController::class, 'getTopForxUsers']);
// la liste des x utilisateurs avec le plus de points (x étant un paramètre int précisé dans la route)
