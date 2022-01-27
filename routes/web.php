<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FonContactController;

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

Route::get('/',[HomeController::class, 'index'])->name('Index');
Route::get('about',[HomeController::class, 'About'])->name('about');
Route::get('portfolio',[HomeController::class, 'Portfolio'])->name('portfolio');
Route::get('blog',[HomeController::class, 'Blog'])->name('blog');
Route::get('contact',[HomeController::class, 'Contact'])->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([ 'as' => 'admin.','prefix' => 'admin','middleware' => ['auth','admin']], function() {
 Route::get('dashboard',[AdminController::class ,'index'])->name('dashboard');

  Route::resource('banners', BannerController::class);
  Route::resource('about',   AboutController::class);
  Route::resource('blog', BlogController::class);
  Route::resource('portfolio', PortfolioController::class);
  Route::resource('testmonial', TestmonialController::class);


  Route::get('contact/show',[ContactController::class, 'ContactShow'])->name('contact.show');
  Route::delete('contact/destroy/{id}',[ContactController::class, 'ContactDestroy'])->name('contact.destroy');

});



Route::group([ 'as' => 'user.','prefix' => 'user','middleware' => ['auth','user']], function() {
 Route::get('dashboard',[UserController::class ,'index'])->name('dashboard');
});


Route::post('contact/post',[FonContactController::class ,'ContactStore'])->name('contact.post');