<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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


// ログイン必須ルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('login', [BookController::class, 'index'])->name('bookshelf.index');

    // 一覧
    Route::get('bookshelf', [BookController::class, 'index'])->name('bookshelf.index');

    // 登録画面
    Route::get('book/create', [BookController::class, 'create'])->name('bookshelf.create');

    // 登録処理
    Route::post('book/store', [BookController::class, 'store'])->name('bookshelf.store');

    // 詳細画面
    Route::get('book/detail/{id}', [BookController::class, 'detail'])->name('bookshelf.detail');

    // 編集画面
    Route::get('book/edit/{id}', [BookController::class, 'edit'])->name('bookshelf.edit');

 
    // 編集処理
    Route::post('book/update/{id}', [BookController::class, 'update'])->name('bookshelf.update');

    // 削除確認画面
    Route::get('book/confirm/{id}', [BookController::class, 'confirm'])->name('bookshelf.confirm');

    // 削除画面
    Route::get('book/delete/{id}', [BookController::class, 'delete'])->name('bookshelf.delete');

    // // 削除処理
    // Route::post('book/confirm/{id}', [BookController::class, 'confirm'])->name('bookshelf.confirm');

    // 読み終わった本
    Route::get('book/complete', [BookController::class, 'complete'])->name('bookshelf.completed-book');

    //学習中の本
    Route::get('book/reading', [BookController::class, 'reading'])->name('bookshelf.reading-book');

    //これから学習する本
    Route::get('book/standby', [BookController::class, 'standby'])->name('bookshelf.standby-book');
});

require __DIR__.'/auth.php';
