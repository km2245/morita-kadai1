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

// // TOP（とりあえず welcome）
// Route::get('/', function () {
//     return view('welcome');
// });

// 入力画面
Route::get('/', [ContactController::class, 'index'])->name('contact.index');

// 確認画面
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

// 送信処理
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');


// サンクスページ
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');


Route::middleware('auth')->group(function () {

    // 管理画面一覧
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    // 検索
    Route::get('/search', [AdminController::class, 'search'])
        ->name('admin.search');

    // 検索リセット
    Route::get('/reset', [AdminController::class, 'reset'])
        ->name('admin.reset');

    // 削除
    Route::delete('/delete', [AdminController::class, 'destroy'])
        ->name('admin.delete');

    // エクスポート
    Route::get('/export', [AdminController::class, 'export'])
        ->name('admin.export');

    // ログアウト
    Route::post('/logout', function () {
        auth()->logout();
        return redirect('/login');
    })->name('logout');
});
