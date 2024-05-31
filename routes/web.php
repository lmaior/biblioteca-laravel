<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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

Route::get('/asd', function () {
    return view('welcome');
})->name('asd');

// Route::get('/teste', function () {
//     return view('teste');
// })->name('teste');

// Route::get('/', function () {
//     $usuario = "felipe";
//     return view('teste', ['usuario' => $usuario]);
// });

Route::get('/', [BooksController::class, 'index'])->name('main');
Route::post('/', [BooksController::class, 'store']);
Route::get('/adicionar', [BooksController::class, 'create'])->name('createBook');
Route::get('/edit/{id}', [BooksController::class, 'edit'])->name('editBook');
Route::put('/update/{id}', [BooksController::class, 'update'])->name('updateBook');
Route::delete('/delete/{id}', [BooksController::class, 'delete'])->name('deleteBook');
Route::get('/detalhes/{id}', [BooksController::class,'show'])->name('showBookDetails');

Route::get('/teste', [BooksController::class, 'teste'])->name('teste');