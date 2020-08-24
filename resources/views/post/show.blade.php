@extends('layouts.app')


@section('content')
<a href="/post" class="btn btn-default"> Go Back</a>
<h1>{{$posts->title}}</h1>
    <div>
        {!!$posts->body!!}
    </div>

<hr>
 <small>Written on {{$posts->created_at}}</small>
 
 <hr>
 <a href="/post/{{$posts->id}}/edit" class="btn btn-default"> Edit</a>
 
{!! Form::open(['action' => ['PostsController@destroy', $posts->id] , 'method' => 'post' ,'class' => 'pull-right']) !!}
  {{Form::hidden('_method','DELETE')}}  
{{Form::submit('Delete',  ['class'=>'btn btn-danger'])}}   


@endsection

 
