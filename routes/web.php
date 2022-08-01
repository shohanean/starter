<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\{HomeController, SocialController, ProfileController};

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
    return view('index');
})->name('index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/import', [HomeController::class, 'import'])->name('import');

//Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent again!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Profile Routes
Route::resource('profile', ProfileController::class);

//Socialite Routes
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect'])->name('auth.facebook');
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook'])->name('auth.facebook.callback');
