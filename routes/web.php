<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\ComputerController;
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

Route::get('/',[StaticController::class, 'index'])->name('home.index');
Route::get('/about',[StaticController::class, 'about'])->name('home.about');
Route::get('/contact', [StaticController::class, 'contact'])->name('home.contact');

Route::resource('computers',ComputerController::class);



// Route::get('/store/{category?}/{item?}', function($category = null, $item = null){
//     if (isset($category)) {
//         if (isset($item)) {
//             return "<h1>{$item}</h1>";
//         }
//         return "<h1>{$category}</h1>";
//     }
//     return "<h1>STORE</h1>";
// });
// Route::get('/store', function(){
//     $filter = request('style');
//     if(isset($filter)){
//         return "<h1>This page is viewing ".strip_tags($filter)."</h1>";
//     }
//     return "<h1>This page is viewing all products</h1>";
// });