<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UsersController;

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

//１、groupを作る、function() {} これも忘れないで！
//2、prefixとasを設定
//3、/usersのrouteをgroup内に入れる
//4、3のrouteを変更する。
//５、3の元のrouteを削除

Route::group(['prefix' => 'users', 'as' => 'users.', 'middleware' => ['auth']], function () {
    //
    Route::post('/update/{id}', [UsersController::class, 'update'])->name('update');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
});

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    //　一覧
    Route::get('/', [UsersController::class, 'list'])->name('list');
});

// route　groupで middleware => '[auth']と追加するとログイン後でしか使えなくできる
// もしログインしてなくても見えるようにしたかったら別のグループにまとめてmiddlewareを設定しない！

//今の設定すると、ログインしてなかったら指定した場所に飛ばせる。別のグループにまとめるというのは、インスタとか投稿見れるけど、ログインしてないと投稿とかできないのと同じ

Route::group(['prefix' => 'tasks', 'as' => 'tasks.', 'middleware' => ['auth']], function() {
    // タスク追加
    Route::get('/add', [TasksController::class, 'add'])->name('add');
    // タスク追加-DBに値を入れる処理
    Route::post('/add', [TasksController::class, 'store'])->name('store');
    // タスク編集画面
    Route::get('/edit/{id}', [TasksController::class, 'edit'])->name('edit');
    // タスク更新処理
    Route::post('/edit/{id}', [TasksController::class, 'update'])->name('update');
    //タスク削除
    Route::post('/delete/{id}', [TasksController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function () {
    // タスク表示
    Route::get('/', [TasksController::class, 'index'])->name('index');
    // 詳細ページ
    Route::get('/{id}', [TasksController::class, 'show'])->name('show');
});

//ここは自動的に生成された認証のコードのまとめやからカスタマイズしないならこのままで、実務ではもっとカスタマイズする
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
