<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth', function (Request $request) {
    $user = \App\Models\User::select('id', 'name', 'email', 'password')->where('email', $request->email)->firstOrFail();
    $password = \Illuminate\Support\Facades\Hash::check($request->password, $user->password);
    if (!$password) {
        throw new \Exception('Password inválido');
    }
    $token = auth('api')->login($user);
    return response()->json([
        'user' => $user,
        'token' => $token
    ]);
});

Route::post('/user', function (Request $request){
    return \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
    ]);
});


Route::middleware('auth:api')->controller(\App\Http\Controllers\CarController::class)->group(function() {
    Route::get('/car', 'index');
    Route::get('/car/showAll', 'showAll');
    Route::get('/car/getAllCarsByPerson/{int:id}', 'getAllCarsByPerson');
    // Route::get('/car/{int:id}', 'show');

});

