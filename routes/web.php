<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;

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

Route::get('/registration-form', [UserController::class, 'registration'])->name('registration.form');
Route::post('/registration-store', [UserController::class, 'registrationStore'])->name('registration.store');

Route::get('/login', [UserController::class, 'loginForm'])->name('user.login');
Route::post('/do-login', [UserController::class, 'doLogin'])->name('user.login.post');

Route::group(['middleware' => 'CheckUser'], function () {

    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/notes-list', [NoteController::class, 'noteList'])->name('note.list');
    Route::get('/note/add', [NoteController::class, 'noteAdd'])->name('note.add');
    Route::post('/note/store', [NoteController::class, 'noteStore'])->name('note.store');
    Route::get('/note/view/{id}', [NoteController::class, 'noteView'])->name('note.view');
    Route::get('/note/edit/{id}', [NoteController::class, 'noteEdit'])->name('note.edit');
    Route::put('/note/update/{id}', [NoteController::class, 'noteUpdate'])->name('note.update');
    Route::get('/note/delete/{id}', [NoteController::class, 'noteDelete'])->name('note.delete');

    Route::get('/search-notes', [NoteController::class, 'search'])->name('note.search');

    Route::get('/admin-dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/users/list', [UserController::class, 'userList'])->name('users.list');
    Route::get('/delete/user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');

    Route::get('/profile-view', [UserController::class, 'profileView'])->name('profile.view');
    Route::get('/edit/profile/{id}', [UserController::class, 'editProfile'])->name('edit.profile');
    Route::post('/update/profile/{id}', [UserController::class, 'updateProfile'])->name('update.profile');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
