<?php

use App\Http\Controllers\TestController;
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

Route::get('/', [TestController::class, 'portofolio']);
Route::get('/home', [TestController::class, 'portofolio']);
// Route::get('/portofolio', function () {
//     return view('portofolio');
// });

Route::get('/shop',[TestController::class, 'shop']);
Route::get('/droneshop',[TestController::class, 'droneshop']);
Route::get('/droneshop/$p->id/dronedetail',[TestController::class, 'dronedetail']);
Route::get('/landingpage',[TestController::class, 'dronedashboard']);
