@extends('layouts.app')

@section('content')
  @if (Auth::check())<!--現在の閲覧者がログイン中かどうかをチェック-->
  
    <h1>メッセージ一覧</h1>
      <h3 class="panel-title">{{ $user->name }}</h3>

      <table class="table table-striped"><!--テーブル表示-->
        <thead>
          <tr>
            <th>id</th>
            <th>タイトル</th>
            <th>メッセージ</th>
          </tr>
        </thead>
        <tbody>          
          @foreach ($tasks as $task)<!--一つづつ取り出して表示する-->
            <tr>
              <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td><!--idの表示と「show」へのリンク-->
              <td>{{ $task->status }}</td><!--$taskからstatusを取り出して表示-->
              <td>{{ $task->content }}</td><!--$taskからcontentを取り出して表示-->         
            </tr>
          @endforeach
        </tbody>
    </table>
    {!! link_to_route('tasks.create', '新規メッセージの投稿', 
    null, ['class' => 'btn btn-primary']) !!} <!--青ボタン(btn btn-defau)表示--> 
    
        <!--<?php $user = Auth::user(); ?><!--ログイン中のユーザを取得-->
        <!--{{ $user->name }}-->
        
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Tasklist</h1>
            {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}<!--signup.getへのリンク-->
        </div>
    </div>
  @endif
@endsection