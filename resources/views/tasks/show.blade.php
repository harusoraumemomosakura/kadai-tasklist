@extends('layouts.app')

@section('content')

  <h1>id={{$task->id}}のタスク詳細ページ</h1>
  
  <table class="table table-bordered"><!--テーブル表示-->
    <tr>
      <th>id</th>
      <td>{{$task->id}}</td><!--id表示-->
    </tr>
    
    <tr>
      <th>ステータス</th>
      <td>{{$task->status}}</td><!--status表示-->
    </tr>
    
    <tr>
      <th>タスク</th>
      <td>{{$task->content}}</td><!--content表示-->
    </tr>
  </table>
  
  <!---editへのリンク-->
  {!! link_to_route('tasks.edit', 'このタスクを編集',['id' => $task->id], ['class' => 'btn btn-default']) !!} <!--[btn btn-default･･･ボタン表示]-->
  
  <!--削除ボタン作成-->
  {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!} <!--削除ボタン作成-->
    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}<!--[btn btn-danger･･･ボタン表示]-->
  {!! Form::close() !!}
  
@endsection