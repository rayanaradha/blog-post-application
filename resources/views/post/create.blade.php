@extends('layouts.app')


@section('content')
<h1>Create Posts</h1>
  {!! Form::open(['action' => 'PostsController@store' , 'method' => 'post' , 'enctype' => 'multipart/form-data']) !!}

  <div class="from-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', '', ['class'=>'form-control' ,'placeholder'=>'Title'])}}
  </div><br>
  
  <div class="from-group">
      {{Form::label('body', 'Body')}}
      {{Form::textarea('body', '', ['id'=>'article-ckeditor', 'class'=>'form-control' ,'placeholder'=>'Body Text'])}}
  </div><br>
  
  <div class="from-group">
      {{Form::file('cover_image')}}
  </div>
  <br>

{{Form::submit('Submit',  ['class'=>'btn btn-primary'])}}    
{!! Form::close() !!}


@endsection

