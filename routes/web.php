<?php

use App\Http\Controllers\SocialAuthController;
use App\Models\Event;
use App\Services\Facades\EventSettings;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    // EventSettings::createEvent(1, 1, 'extending test getting type in static function', '2022-1-1', ['if this works I\'m happy']);
    // EventSettings::deleteEvent(9);
    // EventSettings::updateItem(5, 1, 'dit is de nieuwe title');
    EventSettings::typeChange(20,2);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//google login
Route::get('/login/google', [SocialAuthController::class, 'google']);
Route::get('/login/google/redirect', [SocialAuthController::class, 'redirect']);


// Route::get('/login/', function () {
//     return Socialite::driver('google')->redirect();
// });
 
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('google')->user();
 
//     // $user->token
// });
