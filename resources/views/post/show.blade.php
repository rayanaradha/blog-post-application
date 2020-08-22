@extends('layouts.app')


@section('content')
<a href="/post" class="btn btn-default"> Go Back</a>
<h1>{{$posts->title}}</h1>
    <div>
        {{$posts->body}}
    </div>

<hr>
 <small>Written on {{$posts->created_at}}</small>

@endsection


