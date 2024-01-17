<?php

//Routeクラスを使うことを宣言
use Illuminate\Support\Facades\Route;

//ルーティングを設定するコントローラを宣言する(PostContollerクラスを使うことを宣言する)
use App\Http\Controllers\PostController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route:: get('/', [PostController::class, 'index']);

/*
//投稿一覧のページ　
//Route::HTTPリクエストメソッド名('相対URL', [コントローラ名::class, 'アクション名']);
//リクエストメソッド(GET, POST, PUT/PATCH, DELETE)
//->name()でルートに名前を付けられる
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//投稿の作成ページ
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//投稿の作成機能
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//投稿詳細のページ
//URLの{モデル名}のようにモデル名を囲むとモデルのインスタンスを受け取れるようになり、自動的に受け取ったインスタンスのidを{モデル名}の部分に入れてくれる
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
//投稿の更新ページ
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
//投稿の更新機能　patchは部分的な更新　putは全体的な更新
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
//投稿の削除機能
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
*/

Route::resource('posts', PostController::class);
