@extends('layouts.app')

@section('content')
<a href="/post" class="btn btn-primary"> Go Back</a>
<h1>{{$posts->title}}</h1>
    <div>
        {!!$posts->body!!}
    </div>

<hr>
 <small>Written on {{$posts->created_at}} by {{$posts->user->name}}</small>
 
 <hr>
 @if(!Auth::guest())
    @if(Auth::user()->id == $posts->user->id)
      <a href="/post/{{$posts->id}}/edit" class="btn btn-primary"> Edit</a>
 
        {!! Form::open(['action' => ['PostsController@destroy', $posts->id] , 'method' => 'post' ,'class' => 'pull-right']) !!}
          {{Form::hidden('_method','DELETE')}}  
        {{Form::submit('Delete',  ['class'=>'btn btn-danger'])}}   
    @endif    
@endif

@endsection

 
