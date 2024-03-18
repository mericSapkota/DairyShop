<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FarmerDetailsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\FarmerDetails;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get("/admin", [FarmerDetailsController::class, 'index']);
    Route::get('/admin/products/add', [FarmerDetailsController::class, 'create']);
    Route::post('/admin', [FarmerDetailsController::class, 'store']);
    Route::get('/admin/products/edit/{id}', [FarmerDetailsController::class, 'edit']);
    Route::patch("/update/qty/{id}", [FarmerDetailsController::class, 'update']);
    Route::delete('admin/products/delete/{id}', [FarmerDetailsController::class, 'delete']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dash', function () {
    $user = User::where('id', Auth::id());
    return view('shop.dashboard');
});

Route::get("/user/cart", [OrderController::class, 'index']);
Route::post('/shop/cart/{id}', [OrderController::class, 'store']);



Route::get('/payment/create', [PaymentController::class, 'index']);

require __DIR__ . '/auth.php';
Route::get('payment/unregisteredIndex', [PaymentController::class, 'urIndex']);

Route::get('/home', [UserController::class, "index"]);
Route::get('/shop', [UserController::class, 'productsView']);
Route::get("/shop/product/{name}", [OrderController::class, "showProduct"]);

Route::get("/cart/{id}", [OrderController::class, 'cart']);
Route::get('/payment/{id}', [PaymentController::class, 'index']);
Route::post('/payment/{id}', [PaymentController::class, 'store']);


Route::get('/cart', [OrderController::class, 'unregisteredUserCart']);
