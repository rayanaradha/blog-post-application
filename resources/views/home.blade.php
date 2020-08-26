@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="panel-body">
                    <a href="/post/create" class="btn btn-primary"> Create Post</a><br>
                    <h3>Craete Your Blog Posts </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
