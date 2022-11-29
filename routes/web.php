<?php

use App\Http\Controllers\BranchofficeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FederalstateController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\FunctionsController;
use App\Http\Controllers\NetworkPartnersController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\OrganisationsController;
use App\Http\Controllers\PersonsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SalutationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatuspersonController;
use App\Http\Controllers\TitleawardedController;
use App\Http\Controllers\TitleprefixController;
use App\Http\Controllers\TitlesuffixController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('/', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

// =========================== Forget Password ================================
Route::get('forget_email', [ForgetPasswordController::class, 'create'])->name('forget.create');
Route::post('forget_email/store', [ForgetPasswordController::class, 'store'])->name('forget.store');
Route::get('reset_email/{token}', [ForgetPasswordController::class, 'showResetPassword'])->name('reset.create');
Route::post('reset_email', [ForgetPasswordController::class, 'storeResetPassword'])->name('reset.store');

// =========================== Organisations Controller ================================
Route::group(['prefix' => 'organisations', 'as' => 'organisations.'], function () {
    Route::get('/', [OrganisationsController::class, 'index'])->name('index');
    Route::get('/create', [OrganisationsController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [OrganisationsController::class, 'edit'])->name('edit');
    Route::post('/delete/{id}', [OrganisationsController::class, 'delete'])->name('delete');
    Route::get('/show', [OrganisationsController::class, 'show'])->name('show');
});

// =========================== BranchOffice Controller ================================
Route::group(['prefix' => 'branchoffice', 'as' => 'branchoffice.'], function () {
    Route::get('/', [BranchofficeController::class, 'index'])->name('index');
    Route::get('/create', [BranchofficeController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [BranchofficeController::class, 'edit'])->name('edit');
    Route::post('/delete/{id}', [BranchofficeController::class, 'delete'])->name('delete');
    Route::get('/show', [BranchofficeController::class, 'show'])->name('show');
});

// =========================== Persons Controller ================================
Route::group(['prefix' => 'persons', 'as' => 'persons.'], function () {
    Route::get('/', [PersonsController::class, 'index'])->name('index');
    Route::get('/create', [PersonsController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [PersonsController::class, 'edit'])->name('edit');
    Route::post('/delete/{id}', [PersonsController::class, 'delete'])->name('delete');
    Route::get('/show', [PersonsController::class, 'show'])->name('show');
});

// =========================== Network Partners Controller ================================
Route::group(['prefix' => 'networkpartners', 'as' => 'networkpartners.'], function () {
    Route::get('/', [NetworkPartnersController::class, 'index'])->name('index');
    Route::get('/create', [NetworkPartnersController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [NetworkPartnersController::class, 'edit'])->name('edit');
    Route::post('/delete/{id}', [NetworkPartnersController::class, 'delete'])->name('delete');
    Route::get('/show', [NetworkPartnersController::class, 'show'])->name('show');
});

// =========================== Notes Controller ================================
Route::group(['prefix' => 'notes', 'as' => 'notes.'], function () {
    Route::get('/', [NotesController::class, 'index'])->name('index');
    Route::get('/create', [NotesController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [NotesController::class, 'edit'])->name('edit');
    Route::post('/delete/{id}', [NotesController::class, 'delete'])->name('delete');
    Route::get('/show', [NotesController::class, 'show'])->name('show');
});

// =========================== City Controller ================================
Route::group(['prefix' => 'cities', 'as' => 'cities.'], function () {
    Route::get('/', [CityController::class, 'index'])->name('index');
    Route::get('/create', [CityController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [CityController::class, 'edit'])->name('edit');
    Route::post('/delete/{id}', [CityController::class, 'delete'])->name('delete');
    Route::get('/show', [CityController::class, 'show'])->name('show');
});

// =========================== Topic Controller ================================
Route::group(['prefix' => 'topic', 'as' => 'topic.'], function () {
    Route::get('/', [TopicController::class, 'index'])->name('index');
    Route::get('/create', [TopicController::class, 'create'])->name('create');
    Route::post('/delete/{id}', [TopicController::class, 'delete'])->name('delete');
    Route::get('/show', [TopicController::class, 'show'])->name('show');
});

// =========================== Salutation Controller ================================
Route::group(['prefix' => 'salutation', 'as' => 'salutation.'], function () {
    Route::get('/', [SalutationController::class, 'index'])->name('index');
    Route::get('/create', [SalutationController::class, 'create'])->name('create');
    Route::post('/delete/{id}', [SalutationController::class, 'delete'])->name('delete');
    Route::get('/show', [SalutationController::class, 'show'])->name('show');
});

// =========================== Title prefix Controller ================================
Route::group(['prefix' => 'titleprefix', 'as' => 'titleprefix.'], function () {
    Route::get('/', [TitleprefixController::class, 'index'])->name('index');
    Route::get('/create', [TitleprefixController::class, 'create'])->name('create');
    Route::post('/delete/{id}', [TitleprefixController::class, 'delete'])->name('delete');
    Route::get('/show', [TitleprefixController::class, 'show'])->name('show');
});

// =========================== Title prefix Controller ================================
Route::group(['prefix' => 'titlesuffix', 'as' => 'titlesuffix.'], function () {
    Route::get('/', [TitlesuffixController::class, 'index'])->name('index');
    Route::get('/create', [TitlesuffixController::class, 'create'])->name('create');
    Route::post('/delete/{id}', [TitlesuffixController::class, 'delete'])->name('delete');
    Route::get('/show', [TitlesuffixController::class, 'show'])->name('show');
});

// =========================== Titleawarded Controller ================================
Route::group(['prefix' => 'titleawarded', 'as' => 'titleawarded.'], function () {
    Route::get('/', [TitleawardedController::class, 'index'])->name('index');
    Route::get('/create', [TitleawardedController::class, 'create'])->name('create');
    Route::post('/delete/{id}', [TitleawardedController::class, 'delete'])->name('delete');
    Route::get('/show', [TitleawardedController::class, 'show'])->name('show');
});

// =========================== Federalstate Controller ================================
Route::group(['prefix' => 'federalstate', 'as' => 'federalstate.'], function () {
    Route::get('/', [FederalstateController::class, 'index'])->name('index');
    Route::get('/create', [FederalstateController::class, 'create'])->name('create');
    Route::post('/delete/{id}', [FederalstateController::class, 'delete'])->name('delete');
    Route::get('/show', [FederalstateController::class, 'show'])->name('show');
});

// =========================== Functions Controller ================================
Route::group(['prefix' => 'functions', 'as' => 'functions.'], function () {
    Route::get('/', [FunctionsController::class, 'index'])->name('index');
    Route::get('/create', [FunctionsController::class, 'create'])->name('create');
    Route::post('/delete/{id}', [FunctionsController::class, 'delete'])->name('delete');
    Route::get('/show', [FunctionsController::class, 'show'])->name('show');
});

// =========================== Status Controller ================================
Route::group(['prefix' => 'status', 'as' => 'status.'], function () {
    Route::get('/', [StatusController::class, 'index'])->name('index');
    Route::get('/create', [StatusController::class, 'create'])->name('create');
    Route::post('/delete/{id}', [StatusController::class, 'delete'])->name('delete');
    Route::get('/show', [StatusController::class, 'show'])->name('show');
});

// =========================== Functions Controller ================================
Route::group(['prefix' => 'statusperson', 'as' => 'statusperson.'], function () {
    Route::get('/', [StatuspersonController::class, 'index'])->name('index');
    Route::get('/create', [StatuspersonController::class, 'create'])->name('create');
    Route::post('/delete/{id}', [StatuspersonController::class, 'delete'])->name('delete');
    Route::get('/show', [StatuspersonController::class, 'show'])->name('show');
});

// =========================== Status Controller ================================
Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    Route::get('/show', [CategoryController::class, 'show'])->name('show');
});

// =========================== Country Controller ================================
Route::group(['prefix' => 'country', 'as' => 'country.'], function () {
    Route::get('/', [CountryController::class, 'index'])->name('index');
});

// =========================== User Controller ================================
Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [UserController::class, 'delete'])->name('delete');
    Route::get('/show', [UserController::class, 'show'])->name('show');
    Route::get('/profile', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/updateProfileDetail', [UserController::class, 'updateProfileDetail'])->name('updateProfileDetail');
    Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
    Route::post('/chnage_status/{id}', [UserController::class, 'chnage_status'])->name('chnage_status');
});

// =========================== Roles Controller ================================
Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
    Route::get('/', [RolesController::class, 'index'])->name('index');
    Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [RolesController::class, 'update'])->name('update');
    Route::get('/show', [RolesController::class, 'show'])->name('show');
});
