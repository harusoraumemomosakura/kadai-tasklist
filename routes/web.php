<?php

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

Route::get('/', 'TasksController@index');

Route::resource('tasks', 'TasksController');

/* CRUD　　「Route::resource('tasks', 'TasksController');」が下記7点を示している
Route::get('tasks/{id}', 'TasksController@show')->name('tasks.show');・・・タスクの個別詳細ページ表示
Route::post('tasks', 'TasksController@store')->name('tasks.store');・・・タスクの新規登録を処理（新規登録画面を表示するためのものではありません）
Route::put('tasks/{id}', 'TasksController@update')->name('tasks.update');・・・タスクの更新処理（編集画面を表示するためのものではありません）
Route::delete('tasks/{id}', 'TasksController@destroy')->name('tasks.destroy');・・・タスクを削除
Route::get('tasks', 'TasksController@index')->name('tasks.index');・・・showの補助ページ
Route::get('tasks/create', 'TasksController@create')->name('tasks.create');・・・新規作成用のフォームページ
Route::get('tasks/{id}/edit', 'TasksController@edit')->name('tasks.edit');・・・ 更新用のフォームページ
 */