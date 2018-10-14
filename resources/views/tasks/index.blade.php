@extends('layouts.app')

@section('content')

  <h1>タスク一覧</h1>
  
  @if(count($tasks)>0) <!--$tasksレコードが1個以上あれば-->
    <ul>
        @foreach($tasks as $task)<!--一つづつ取り出して表示する-->
          <li>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} : {{ $task->content }}</li><!--「show」へのリンク-->
        @endforeach
    </ul>
  @endif

@endsection