<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        //$users = User::all(); //全部表示
        $users = User::paginate(10);//ページネーション

        return view('users.index', [
            'users' => $users, //●●=>$▲▲・・・●●がビューファイルでの変数になる。
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);//$idを探して$userに代入

        return view('users.show', [
            'user' => $user, //●●=>$▲▲・・・●●がビューファイルでの変数になる。
        ]);
    }
}
