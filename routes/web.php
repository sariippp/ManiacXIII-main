<?php

//use App\Http\Controllers\Admin\AdminController;
//use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::group(
    ['middleware' => 'guest', 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        // Dashboard
        Route::get('/', [Admin\AdminController::class, 'index'])->name('dashboard');
        Route::get('/messages', [Admin\AdminController::class, 'messages'])->name('messages');
        Route::get('/messages/search', [Admin\AdminController::class, 'searchMessage'])->name('search-message');
        //Route::get('show', [AdminController::class, 'showMessages'])->name('show');
        Route::get('/messages/{team:name}', [Admin\AdminController::class, 'showChat'])->name('chat');
        Route::post('/message-send', [Admin\AdminController::class, 'sendChat'])->name('chat.send');

        // Registration
        Route::get('/registration', [Admin\TeamController::class, 'index'])->name('teams.index');
        Route::get('/registration/search', [Admin\TeamController::class, 'search'])->name('teams.search');
        Route::post('registration/deactivate', [Admin\TeamController::class, 'deactivateTeam'])->name('teams.deactivate');

        // Uers
        Route::get('/users', [Admin\UserController::class, 'index'])->name('users.index');
        Route::post('/users/store', [Admin\UserController::class, 'store'])->name('users.store');
        Route::post('/users/destroy', [Admin\UserController::class, 'destroy'])->name('users.destroy');
    }
);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
