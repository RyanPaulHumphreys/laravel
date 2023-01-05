@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <div align='center'>
        <p>Posts:</p>
        <ul>
            @foreach ($posts as $post)
                <li style="width:1000px;height:100px;border:3px solid #000;"><a href="{{route('posts.show', ['post' => $post])}}"> {{App\Models\User::find($post->user_id)->name}} : {{$post->content}} </a></li>
            @endforeach
        </ul>
    </div>
@endsection