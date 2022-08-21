<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('get/{id}', function($id) {
    echo "get ID : ".$id;
});

/**
 * Check if value is null
 * if true => null 
 * else => not null
 */
function checkNull($value){
    if ($value === null || trim($value) === '' ) {
        # code...
        return true;
    }
    return false;
}

Route::post('post', function(Request $req){
    $prenom = Request::input('prenom');
    $nom = Request::input('nom');
    $email = Request::input('email');
    $mdp = Request::input('mdp');
    $mdp_sure = Request::input('mdp_sure');

    if ( checkNull($prenom) ) {
        # code...
        return "prenom empty";
    }

    if ( checkNull($nom) ) {
        # code...
        return "nom empty";
    }

    if ( checkNull($email) ) {
        # code...
        return "email empty";
    }

    if ( checkNull($mdp) ) {
        # code...
        return "mot de passe empty";
    }

    if ( checkNull($mdp_sure) ) {
        # code...
        return "mot de passe confirmé empty";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return "Invalid email format";
    }

    if ($mdp !== $mdp_sure) {
        # code...
        return "mot de passe confirmé";
    }

    $a = DB::table('account')
    -> where('email','=',$email)->get();
    if ( (count($a) == 0) ){
        echo "insert OK";
        $a = DB::table('account')->insert([
            ['prenom' => $prenom, 
            'nom' => $nom,
            'email' => $email,
            'mdp' => $mdp,
            'mdp_sure' => $mdp_sure,]
        ]);
    }
    else {
        return "The email is used already";
    }
    
});

Route::post('login', function(Request $req){

    $email = Request::input('email');
    $mdp = Request::input('mdp');

    $check = DB::table('account')
        ->where('email','=',$email)
        ->where('mdp','=',$mdp)
        ->get();
    $real = json_decode(json_encode($check),true);


    if (count($real) ==1){
        echo "Correct";
    }
    else {
        echo "Incorrect mot de passe ou compte n'existe pas";
    }
});