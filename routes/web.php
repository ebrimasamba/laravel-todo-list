<?php

use App\Http\Controllers\TodoController;
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
    return view("welcome");
});


Route::prefix('todos')->group(function () {
    Route::get('/', [TodoController::class, "index"]);
    Route::get('/edit/{todo}', [TodoController::class, "edit"]);
    Route::patch('/update/{todo}', [TodoController::class, "update"]);
    Route::patch('/completed/{todo}', [TodoController::class, "completed"]);
    Route::post('/', [TodoController::class, "store"]);
    Route::delete('/{todo}', [TodoController::class, "destroy"]);

});