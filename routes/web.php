<?php

use App\Http\Controllers\ApprovedJobsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CancelJobsController;
use App\Http\Controllers\DailyUpdateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RequestedJobsController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;


Route::get('/set-theme/{theme}',[ThemeController::class,'setTheme'])->name('set.theme');
Route::get('/get-theme',[ThemeController::class,'getCookie'])->name('get.theme');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('users', [UserController::class, 'index'])
    ->middleware('CheckSpecificUser')
    ->name('users.index');

Route::get('users/{user}', [UserController::class, 'show'])
    ->middleware('CheckSpecificUser')
    ->name('user.show');

Route::get('contact', [RequestedJobsController::class, 'create'])->name('contact');

Route::post('contact', [RequestedJobsController::class, 'store'])->name('requestedjob.store');

Route::get('requestedjobs/{id?}', [RequestedJobsController::class, 'index'])->name('requestedjob.index');






Route::post('approvedjobs', [ApprovedJobsController::class, 'store'])->name('approvedjobs.store');

Route::get('approvedjobs', [ApprovedJobsController::class, 'index'])->name('approvedjobs.index');

Route::get('/approvedjobs/{approvedjob}', [ApprovedJobsController::class, 'show'])->name('approvedjobs.show');

// Route::resource('approvedjobs', ApprovedJobsController::class);


Route::get('canceledjobs', [CancelJobsController::class, 'index'])->name('canceledjobs.index');

Route::post('canceledjobs', [CancelJobsController::class,'store'])->name('canceledjobs.store');

Route::delete('canceledjobs/{canceledjob}', [CancelJobsController::class, 'destroy'])->name('canceledjob.delete');




Route::post('dailyupdates', [DailyUpdateController::class, 'store'])->name('dailyupdate.store');

Route::put('dailyupdates/{dailyupdate}', [DailyUpdateController::class, 'update'])->name('dailyupdate.update');

Route::delete('dailyupdates/{dailyupdate}', [DailyUpdateController::class, 'destroy'])->name('dailyupdate.delete');




Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);


Route::get('profile/{id?}', [ProfileController::class, 'show'])->name('profile');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified', 'Dashboard'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/note',[NoteController::class,'index'])->name('note.index');
// Route::get('/note/create',[NoteController::class,'create'])->name('note.create');
// Route::post('/note',[NoteController::class,'store'])->name('note.store');
// Route::get('/note/{id}',[NoteController::class,'show'])->name('note.show');
// Route::get('/note/{id}/edit',[NoteController::class,'edit'])->name('note.edit');
// Route::put('/note/{id}',[NoteController::class,'update'])->name('note.update');
// Route::delete('/note/{id}', [NoteController::class,'destroy'])->name('note.destroy');


    Route::resource('note', NoteController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/practice', function () {
        return view('practice.practice');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';