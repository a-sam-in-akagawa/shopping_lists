<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Shopping_listsController;

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

Route::get('/', [Shopping_listsController::class, 'index']);
Route::get('/filtering/{id}/{flg}', [Shopping_listsController::class, 'filtering'])->middleware(['auth'])->name('filtering');
Route::get('/dashboard', [Shopping_listsController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/purchase', [Shopping_listsController::class, 'purchase_list'])->middleware(['auth'])->name('purchase');
Route::post('/destroy_all', [Shopping_listsController::class, 'destroy_all'])->middleware(['auth'])->name('destroy_all');


/*Route::get('/dashboard', function () {
    return view('list');
})->middleware(['auth'])->name('dashboard');*/

/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__.'/auth.php';


Route::group(['middleware' => ['auth']], function () {                                    // 追記
    Route::resource('shopping_lists', Shopping_listsController::class, ['only' => ['store', 'destroy', 'update']]);     // 追記
});  