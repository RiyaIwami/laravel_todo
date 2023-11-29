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

//１、groupを作る　　　　　　, function() {} これも忘れないで！
//2、preixとasを設定
//3、/usersのrouteをgroup内に入れる
//4、3のrouteを変更する。 ！！！！！！！！！ここができてないかな！！！！！！
//５、3の元のrouteを削除

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/',[UsersController::class,'registration'])->name('registration');
});
// なんでこうなったかわかった？
// routeの変更と削除する意味があんまりよくわからないですの変更と削除する意味があんまりよくわからないですよくわからないです
//routeの変更はgroup内に元のroute内容をそのまま書くと、groupでパスとnameを path = /users と name = users. になる
//だから元のを変更しないと path = /users/users と　name = users.users.registration になってしまうから。
//削除するのはgroup内に元のrouteの設定をしたのに、元のコードがあると重複してしまうから。
//ということだけどわかるかな？？

//groupとするとなかのrouteに対して先頭にまとめてパスとnameを付け足せる
//prefixって書いてあるのが、URLのパスの部分
//asがnameの部分
//なので、このグループ内にはパスの先頭に/tasksってついてnameの先頭にtasks.っていうのが付くようになってる
Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function() {
    Route::get('/', [TasksController::class, 'index'])->name('index');
    // 詳細ページ
    Route::get('/{id}', [TasksController::class, 'show'])->name('show');
    // タスク追加
    Route::get('/add', [TasksController::class, 'add'])->name('add');
    // タスク追加-DBに値を入れる処理
    Route::post('/add', [TasksController::class, 'store'])->name('store');
    // タスク編集画面
    Route::get('/edit/{id}', [TasksController::class, 'edit'])->name('edit');
    // タスク更新処理
    Route::post('/edit/{id}', [TasksController::class, 'update'])->name('update');

    Route::post('/delete/{id}', [TasksController::class, 'delete'])->name('delete');
});
