@extends('layouts.app')

@section('content')

  <h1>id: {{ $task->id }} のタスク編集ページ</h1>
                                                 <!--「$task->id」でidもPUTで運んでいる-->
  {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
  
    {!! Form::label('status', 'ステータス：') !!}
    {!! Form::text('status') !!}
    
    {!! Form::label('content', 'タスク：') !!}
    {!! Form::text('content') !!}<!--「Form::model」を使うことによりフィールド名に一致するモデルの値が自動的にフィールド値として設定されている-->
                               <!--viewでは既に元のコンテンツが入って表示される(oldを使わなくてよい)-->
    
    {!! Form::submit('更新') !!}
    
  {!! Form::close() !!}

@endsection