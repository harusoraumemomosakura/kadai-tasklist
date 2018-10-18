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

        return view('tasks.index', [
            'users' => $users, //●●=>$▲▲・・・●●がビューファイルでの変数になる。
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);//$idを探して$userに代入
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'tasks' => $tasks,
        ];

        $data += $this->counts($user);

        return view('tasks.show', $data);
    }
}
