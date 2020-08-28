@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="panel-body">
                    <a href="/post/create" class="btn btn-primary"> Create Post</a><br>
                    <h3> Your Blog Posts </h3>
                    @if(count($userPosts)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>

                        </tr>
                     @foreach($userPosts as $userPost)
                     <tr>
                        <td > {{$userPost->title}} </td>
                        
                        <td class="pull-right">
                            <a href="/post/{{$userPost->id}}" class="btn btn-success"> View</a> &nbsp;&nbsp;
                            <a href="/post/{{$userPost->id}}/edit" class="btn btn-primary"> Edit</a> &nbsp;&nbsp;
                            {!! Form::open(['action' => ['PostsController@destroy', $userPost->id] , 'method' => 'post' ,'class' => 'pull-right']) !!}
                            {{Form::hidden('_method','DELETE')}}  
                            {{Form::submit('Delete',  ['class'=>'btn btn-danger'])}}  
                        </td>    
                        
                     </tr>
                     @endforeach
                        
                    </table>    
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    
    
</div>
@endsection
