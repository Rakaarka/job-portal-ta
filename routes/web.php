<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/service', [UserController::class, 'service'])->name('service');
Route::get('/blog', [UserController::class, 'blog'])->name('blog');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');

// job
Route::get('/service/job', [UserController::class, 'job'])->name('job');
Route::get('/service/job/{id}', [UserController::class, 'detailJob'])->name('detailJobUser');

// internship
Route::get('/service/internship', [UserController::class, 'internship'])->name('internship');
Route::get('/service/internship/{id}', [UserController::class, 'detailInternship'])->name('detailInternshipUser');

// workshop
Route::get('/service/workshop', [UserController::class, 'workshop'])->name('workshop');
Route::get('/service/workshop/{id}', [UserController::class, 'detailWorkshop'])->name('detailWorkshopUser');

Route::get('/admin-login', [AuthController::class, 'login'])->name('login');
Route::post('/login-process', [AuthController::class, 'loginProcess'])->name('loginProcess');

Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

Route::group(['prefix' => '/administrator', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('indexAdmin');

    // manajemen workshop
    Route::get('/workshop', [WorkshopController::class, 'index'])->name('indexWorkshop');
    Route::get('/workshop/form-add', [WorkshopController::class, 'formAdd'])->name('formAddWorkshop');
    Route::post('/workshop/add-action', [WorkshopController::class, 'addAction'])->name('addActionWorkshop');
    Route::get('/workshop/detail/{id}', [WorkshopController::class, 'detail'])->name('detailWorkshop');
    Route::get('/workshop/form-edit/{id}', [WorkshopController::class, 'formEdit'])->name('formEditWorkshop');
    Route::post('/workshop/edit-action', [WorkshopController::class, 'editAction'])->name('editActionWorkshop');
    Route::get('/workshop/delete-action/{id}', [WorkshopController::class, 'deleteAction'])->name('deleteActionWorkshop');

    // manajemen internship
    Route::get('/internship', [InternshipController::class, 'index'])->name('indexInternship');
    Route::get('/internship/form-add', [InternshipController::class, 'formAdd'])->name('formAddInternship');
    Route::post('/internship/add-action', [InternshipController::class, 'addAction'])->name('addActionInternship');
    Route::get('/internship/detail/{id}', [InternshipController::class, 'detail'])->name('detailInternship');
    Route::get('/internship/form-edit/{id}', [InternshipController::class, 'formEdit'])->name('formEditInternship');
    Route::post('/internship/edit-action', [InternshipController::class, 'editAction'])->name('editActionInternship');
    Route::get('/internship/delete-action/{id}', [InternshipController::class, 'deleteAction'])->name('deleteActionInternship');

    // manajemen job
    Route::get('/job', [JobController::class, 'index'])->name('indexJob');
    Route::get('/job/form-add', [JobController::class, 'formAdd'])->name('formAddJob');
    Route::post('/job/add-action', [JobController::class, 'addAction'])->name('addActionJob');
    Route::get('/job/detail/{id}', [JobController::class, 'detail'])->name('detailJob');
    Route::get('/job/form-edit/{id}', [JobController::class, 'formEdit'])->name('formEditJob');
    Route::post('/job/edit-action', [JobController::class, 'editAction'])->name('editActionJob');
    Route::get('/job/delete-action/{id}', [JobController::class, 'deleteAction'])->name('deleteActionJob');
});