<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HighchartController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
});

Route::get('send-mail', [MailController::class, 'index']);
Route::get('user-notify', [UserController::class, 'index']);
Route::get('address', [AddressController::class, 'index']);
Route::resource('posts', PostController::class);

Route::controller(FullCalenderController::class)->group(function(){
    Route::get('fullcalender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});

Route::get('datatables', [DatatableController::class, 'index'])->name('datatables.index');

Route::middleware(['setlocale'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('lang', [LanguageController::class, 'change'])->name("change.lang");
});

Route::get('users', [UserController::class, 'index']);

Route::get('image-upload', [ImageController::class, 'index']);
Route::post('image-upload', [ImageController::class, 'store'])->name('image.store');

Route::get('chart', [HighchartController::class, 'index']);

Route::get('/date-format', [DateController::class, 'changeDateFormat']);
Route::get('/date-blade', [DateController::class, 'showDateInBlade']);

Route::get('/create-note', [NoteController::class, 'create']);
Route::get('/update-note/{id}', [NoteController::class, 'update']);
Route::get('/delete-note/{id}', [NoteController::class, 'delete']);

require __DIR__.'/auth.php';
