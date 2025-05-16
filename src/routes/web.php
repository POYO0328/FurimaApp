<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseAddressController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AuthController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});

// ログイン後リダイレクト制御
Route::get('/mypage/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/mypage/profile', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/login-success', function () {
    $user = auth()->user(); // ログイン中のユーザーを取得

    if ($user && $user->first_login_flg) {
        // 初回ログインならプロフィール編集画面へ
        return redirect('/mypage/profile');
    }

    // 通常ログインならマイページへ
    return redirect('/');
})->middleware('auth');

Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');

Route::get('/sell', [SellController::class, 'showForm'])->name('sell.form');

// 保存処理用ルート
Route::post('/sell', [ItemController::class, 'store'])->name('item.store');

Route::get('/mypage', [MypageController::class, 'index'])->name('mypage.index');

Route::get('/purchase/{item_id}', [PurchaseController::class, 'confirm'])->name('purchase.confirm');

Route::post('/purchase/{item_id}/complete', [PurchaseController::class, 'complete'])->name('purchase.complete');

Route::get('/purchase/address/{item_id}', [PurchaseAddressController::class, 'showForm'])->name('purchase.address');
Route::post('/purchase/address/{item_id}', [PurchaseAddressController::class, 'submitAddress'])->name('purchase.address.submit');

//コメント部分
Route::post('/items/{item}/comments', [CommentController::class, 'store'])->name('comment.store');

//いいね部分
// Route::post('/like/{item_id}', [LikeController::class, 'store'])->name('like.store');
Route::post('/like-toggle/{item_id}', [LikeController::class, 'toggle'])->name('like.toggle');