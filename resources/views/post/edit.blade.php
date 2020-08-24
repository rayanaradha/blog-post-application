@extends('layouts.app')


@section('content')
<h1>Edit Posts</h1>
  {!! Form::open(['action' => ['PostsController@update', $posts->id] , 'method' => 'post']) !!}

  <div class="from-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', $posts->title, ['class'=>'form-control' ,'placeholder'=>'Title'])}}
  </div><br>
  
  <div class="from-group">
      {{Form::label('body', 'Body')}}
      {{Form::textarea('body', $posts->body, ['id'=>'article-ckeditor', 'class'=>'form-control' ,'placeholder'=>'Body Text'])}}
  </div><br>
{{Form::hidden('_method','PUT')}}  
{{Form::submit('Submit',  ['class'=>'btn btn-primary'])}}    
{!! Form::close() !!}


@endsection
