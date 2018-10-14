<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;    // 追加

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでtasks/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $tasks = Task::all(); //全部表示
        
        return view('tasks.index',[
            'tasks' => $tasks, //●●=>$▲▲・・・●●がビューファイルでの変数になる。
                               //「 $tasks = Task::all();」をビューファイルに渡している
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでtasks/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $task = new Task; //Task モデルのためのフォームが必要の為インスタンスを作成
        
        return view('tasks.create',[
            'task' => $task, //●●=>$▲▲・・・●●がビューファイルでの変数になる。
                             //「  $task = new Task;」をビューファイルに渡している
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // postでtasks/にアクセスされた場合の「新規登録処理」
    public function store(Request $request) //creteで入力されたデータは「$request」に入っている
    {
        $this->validate($request, [
            'status' => 'required|max:191',   // 追加
            'content' => 'required|max:191',
        ]); //required (カラッポでない) かつ max:191 を検証
        
        $task =new Task;
        $task->status =$request->status; // 追加
        $task->content =$request->content; //creteで入力された内容を「$task」へ代入
        $task->save();
        
        return redirect('/'); //viewは作らずにindexへ戻る
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // getでtasks/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $task = Task::find($id);//$idを探して$taskに代入
        
        return view('tasks.show',[
            'task'=>$task, //●●=>$▲▲・・・●●がビューファイルでの変数になる。
                           //「  $task = Task::find($id);」をビューファイルに渡している
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // getでtasks/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $task = Task::find($id);//$idを探して$taskに代入
        
        return view('tasks.edit',[
            'task'=>$task, //●●=>$▲▲・・・●●がビューファイルでの変数になる。
                           //「  $task = Task::find($id);」をビューファイルに渡している
            ]);
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // putまたはpatchでtasks/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)//editで入力されたデータは「$request」に入っている
    {
        $this->validate($request, [
            'status' => 'required|max:191', // 追加
            'content' => 'required|max:191',
        ]); //required (カラッポでない) かつ max:191 を検証
        
        $task = Task::find($id);//$idを探して$taskに代入
        $task->status =$request->status; // 追加
        $task->content =$request->content; //editで入力された内容を「$task」へ代入
        $task->save();
        
        return redirect('/'); //viewは作らずにindexへ戻る
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // deleteでtasks/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $task = Task::find($id);//$idを探して$taskに代入
        $task->delete();
        
        return redirect('/'); //viewは作らずにindexへ戻る
    }
}
