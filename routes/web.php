<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticelController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\Website\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\VisitorController;
use App\Models\City;
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

Route::get('/', function () {
    return view('welcome');
});

// Login

Route::prefix('cms/')->middleware('guest:admin,author')->group(function () {
    Route::get('{guard}/login' , [UserAuthController::class , 'showLogin'])->name('showlogin');

    Route::post('admin/login' , [UserAuthController::class , 'adminLogin'])->name('admin-login');
    Route::post('author/login' , [UserAuthController::class , 'authorLogin'])->name('author-login');
});


// Logout

Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function (){
    Route::get('logout' , [UserAuthController::class , 'logout'])->name('cms.auth.logout');
});

// Dashboard

Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function (){
    Route::view('' , 'cms.parent')->name('cms.parent');
    Route::view('temp' , 'cms.temp');
    
    Route::resource('countries' , CountryController::class);

    Route::resource('cities' , CityController::class);
    Route::post('citiesUpdate/{id}' , [CityController::class , 'update'])->name('citiesUpdate');


    Route::resource('admins' , AdminController::class);
    Route::post('adminsUpdate/{id}' , [AdminController::class , 'update'])->name('adminsUpdate');
    Route::get('adminCreate/{id}' , [AdminController::class , 'adminCreate'])->name('adminCreate');

    Route::resource('authors' , AuthorController::class);
    Route::post('authorsUpdate/{id}' , [AuthorController::class , 'update'])->name('authorsUpdate');

    Route::resource('categories' , CategoryController::class);
    Route::post('categoriesUpdate/{id}' , [CategoryController::class , 'update'])->name('categoriesUpdate');

    Route::resource('articles' , ArticleController::class);
    Route::post('articlesUpdate/{id}' , [ArticleController::class , 'update'])->name('articlesUpdate');

    Route::get('/create/article/{id}' , [ArticleController::class , 'createArticle'])->name('createArticle');
    Route::get('/index/article/{id}' , [ArticleController::class , 'indexArticle'])->name('indexArticle');

    Route::get('profile' , [ProfileController::class , 'showProfile'])->name('cms.profile');

    Route::resource('roles' , RoleController::class);
    Route::post('rolesUpdate/{id}' , [RoleController::class , 'update'])->name('rolesUpdate');

    Route::resource('permissions' , PermissionController::class);
    Route::post('permissionsUpdate/{id}' , [PermissionController::class , 'update'])->name('permissionsUpdate');

    Route::resource('roles.permissions' , RolePermissionController::class);

    Route::resource('sliders' , SliderController::class);
    Route::post('slidersUpdate/{id}' , [SliderController::class , 'update'])->name('slidersUpdate');

    Route::resource('contacts' , ContactController::class);

    

});


// Website

Route::prefix('home/')->middleware(['auth:visitor'])->group(function () {
    Route::get('/' , [HomeController::class , 'home'])->name('website.home');
    Route::get('contact' , [HomeController::class , 'contact'])->name('website.contact');
    Route::post('contact' , [HomeController::class , 'createContact'])->name('createContact');
    
    Route::get('news/detailes/{id}' , [HomeController::class , 'newsDetailes'])->name('news.detailes');

    Route::get('allNews/{id}' , [HomeController::class , 'allNews'])->name('website.allNews');

    Route::get('showProfile' , [VisitorController::class , 'showProfile'])->name('showProfile');
    Route::get('edit/profile' , [VisitorController::class , 'editProfile'])->name('editProfile');
    Route::post('profileUpdate' , [VisitorController::class , 'updateProfile'])->name('updateProfile');

    Route::get('showPhoto' , [VisitorController::class , 'showUploadPhoto'])->name('showUploadPhoto');
    Route::post('uploadPhoto' , [VisitorController::class , 'uploadPhoto'])->name('uploadPhoto');
    
    Route::post('comment' , [CommentController::class , 'comment'])->name('comment');
    // Route::resource('comments' , CommentController::class);
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
