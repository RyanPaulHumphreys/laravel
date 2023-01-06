@extends('layouts.app')

@section('title', 'Post')
    <title>Create a post</title>

@section('content')
<head>
</head>
<body>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/post.css" rel="stylesheet">
    <div class="create-post">
        <form method="POST" class="create-post-form text-center" action="{{route('posts.store')}}">
            @csrf
            <p>Content: <input type="text" name="content"> </p>
            <p>Group:
                <select name="group_id">
                    <option value="{{null}}">General</option>
                    @foreach(Auth::user()->groups()->get() as $group)
                        <option value="{{$group->id}}">
                            {{$group->name}}
                        </option>
                    @endforeach
                </select>
            </p>
            <input class="submit" type="submit" value="Post">
            <a class="back" href="{{route('posts.index')}}">Back</a>
        </form>
    </div>
</body>
@endsection