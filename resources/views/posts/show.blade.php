@extends('layouts.app')

@section('title', 'Post')
    <title>Post by {{App\Models\User::find($post->user_id)->name}}</title>

@section('content')
<head>
    <link href="/css/output.css" rel="stylesheet">
    <div class="w-full h-2/4">
        <div class="w-2/4 m-5 float-left">
            <ul>
                <li class="bold">{{App\Models\User::find($post->user_id)->name}}</li>
                <li>Posted: {{$post->created_at}}</li>
                @if ($post->group_id != null)
                    <li> Group: {{App\Models\Group::find($post->group_id)->name}}</li>
                @endif
                <li>{{$post->content}}</li>
            </ul>
        </div>
        <div class="w-1/4 float-right mr-10">
            @if($post->image()->get()->first() != null)
                <img src="{{$post->image()->get()->first()->src}}"/>   
            @endif 
        </div>
    </div>
</head>
<body>
    <div class="h-1/2">
        <h2>Comments: </h2>
        <ul>
            @foreach ($comments as $comment)
                <li class="comment-content">
                    <p class="bold">{{App\Models\User::find($comment->user_id)->name}}</p> 
                    <p> {{$comment->content}}</p>
                </li>
            @endforeach
        </ul>
    </div>
</body>
@endsection