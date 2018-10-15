@extends('layouts.app')

@section('content')

  <h1>タスク一覧</h1>
  
  @if(count($tasks)>0) <!--$tasksレコードが1個以上あれば-->
    <table class="table table-striped"><!--テーブル表示-->
    <thead>
      <tr>
        <th>id</th>
        <th>ステータス</th>
        <th>タスク</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tasks as $task)<!--一つづつ取り出して表示する-->
        <tr>
          <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td><!--id表示と「show」へのリンク-->
          <td>{{ $task->status }}</td><!--$taskからstatusを取り出して表示-->
          <td>{{ $task->content }}</td><!--$taskからcontentを取り出して表示-->
        </tr>
      @endforeach
    </tbody>
    </table>
    
  @endif
    {!! link_to_route('tasks.create', '新規タスクの投稿',
     null, ['class' => 'btn btn-primary']) !!} <!--青ボタン(btn btn-defau)表示--> 
     <!--link_to_route() は、
第三引数には、 ['id' => 1] のようなリンクを作るためのパラメータが入る
第四引数には、 ['class' => 'btn btn-primary'] のような HTML タグの属性が入る
となっています。だから「null」が入っている？--> 

@endsection