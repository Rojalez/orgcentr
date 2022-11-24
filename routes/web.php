<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\HomeController;

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


Route::get('/home', function () {
    return view('frontend.pages.home');
})->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';

Route::get('/', function() {
    return view('frontend.pages.main');
});

Route::get('/catalog', function() {
    return view('frontend.pages.catalog.catalog');
});

Route::get('/category', function() {
    return view('frontend.pages.catalog.category');
});



Route::get('/basket', [BasketController::class, 'index'])->name('basket');
Route::post('/basket/to/{id}', [BasketController::class, 'toBasket'])->name('add');
Route::post('/basket/from/{id}', [BasketController::class, 'fromBasket'])->name('minus');
Route::post('/basket/delete/{id}', [BasketController::class, 'deleteBasket'])->name('delete');

Route::get('/oformlenie', function() {
    return view('frontend.pages.catalog.oformlenie');
});

Route::post('/oformlenie', [BasketController::class, 'oformlenie']);

Route::get('/payment', [PaymentController::class, 'index']);

Route::get('/delivery', [DeliveryController::class, 'index']);

Route::get('/remont-techniki', [RepairController::class, 'index'])->name('repair');



Route::get('/contact', function() {
    return view('frontend.pages.help.contact');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', function() {
    return view('frontend.pages.about');
});

Route::get('/privacy-policy', function() {
    return view('frontend.pages.privacy');
});

Route::get('/terms-of-use', function() {
    return view('frontend.pages.soglashenie');
});

Route::post('/feedback', [FeedbackController::class, 'index']);

Route::post('/call', [CallController::class, 'index']);

Route::get('/catalog/{slug}', [CategoryController::class, 'index'])->name('category');

Route::post('/ajax', [SearchController::class, 'ajax']);
Route::get('/ajax', [SearchController::class, 'ajax']);

Route::get('/result', [SearchController::class, 'search']);

Route::get('/product/{id}', [ProductController::class, 'index'])->name('product');


