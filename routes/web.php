<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\SocialAuthController;
use App\Models\Event;
use App\Models\User;
use App\Services\Facades\EventSettings;
use App\Services\Facades\FriendSettings;
use App\Services\Facades\NotificationSending;
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

Route::get('/', function ()
{
    // NotificationSending::sendInvite('stef.geybels@gmail.com');
    // dd(FriendSettings::findFriend(2));
    // NotificationSending::sendInvite('nick.geybels@gmail.com');
    // EventSettings::createEvent(2,1,'new event', '2022-09-05', ['eerste item', 'volgende item']);
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/events', function(){ return view('platform.events.main'); })->name('events');

    Route::get('/friends', function(){ return view('platform.friends.main'); })->name('friends');

    Route::resource('/event', EventController::class)->except('edit')->name('index', 'events');
    // Route::get('/calendar', function() { return view('platform.calendar.main'); })->name('calendar');
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
