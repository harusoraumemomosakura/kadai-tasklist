@extends('layouts.app')

@section('content')

  <h1>id={{$task->id}}のタスク詳細ページ</h1>
  
  <p>ステータス：{{$task->status}}</p>
  <p>タスク：{{$task->content}}</p>
  
  {!! link_to_route('tasks.edit', 'このタスクを編集',['id' => $task->id]) !!} <!--editへのリンク-->
  
  {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!} <!--削除ボタン作成-->
    {!! Form::submit('削除') !!}
  {!! Form::close() !!}
  
@endsection