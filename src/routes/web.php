<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
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

// TOP（とりあえず welcome）
Route::get('/', function () {
    return view('welcome');
});

// 入力画面
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// 確認画面
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

// 送信処理
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


// サンクスページ
Route::get('/contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');


Route::middleware('auth')->group(function () {

    // 管理画面一覧・検索
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    // 詳細（モーダル用）
    Route::get('/admin/{contact}', [AdminController::class, 'show'])
        ->name('admin.show');

    // 削除
    Route::delete('/admin/{contact}', [AdminController::class, 'destroy'])
        ->name('admin.destroy');

    // ログアウト（Fortify）
    Route::post('/logout', function () {
        auth()->logout();
        return redirect('/login');
    })->name('logout');
});
