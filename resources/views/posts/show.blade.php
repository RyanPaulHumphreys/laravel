@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <div>
        <ul>
            <li>User: {{App\Models\User::find($post->user_id)->name}}</li>
            <li>Posted: {{$post->created_at}}</li>


            @if ($post->group_id != null)
                <li> Group: {{$post->group_id}}</li>
            @endif
            <li>{{$post->content}}</li>
        </ul>
    </div>
    <div>
        <h2>Comments: </h2>
        <ul>
            @foreach ($comments as $comment)
                <li style="width:500px;height:100px;border:1px solid #000;"><p>{{App\Models\User::find($comment->user_id)->name}} : {{$comment->content}}</p></li>
            @endforeach
        </ul>
    </div>
@endsection