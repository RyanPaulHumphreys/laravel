@extends('layouts.app')

@section('title')
    <title>Posts</title>
@endsection

@section('content')

<head>
    <div class="create-post-button text-center">
        <a class="bold" href="{{route('posts.create')}}">Create a Post</a>
    </div>
</head>
<body>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/post.css" rel="stylesheet">
    <div class="post-table">
        <p>Posts</p>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <div class="post-stub">
                        <div class="post-stub-content">
                            <p class="bold">{{App\Models\User::find($post->user_id)->name}}</p>
                            <p> in
                                @if ($post->group_id != null) 
                                    {{App\Models\Group::find($post->group_id)->name}} 
                                @else
                                    General
                                @endif
                            </p>
                            <a href="{{route('posts.show', ['post' => $post])}}">
                                {{$post->content}}
                            </a>
                        </div>
                        @if($post->image()->get()->first() != null)
                            <div class="post-stub-thumbnail">
                                <a href="{{route('posts.show', ['post' => $post])}}">
                                    <img src="{{$post->image()->get()->first()->src}}"/>
                                </a>
                            </div>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
@endsection