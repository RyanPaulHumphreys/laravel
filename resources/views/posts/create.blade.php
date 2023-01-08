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
        <form method="POST" enctype="multipart/form-data" class="create-post-form text-center" action="{{route('posts.store')}}">
            @csrf
            <label for="content">Content</label>
            <textarea id="content" name="content" placeholder="Write here..." class="create-post-form-content">  </textarea>
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
            <input type="file" id="image" name="image">
            <input class="submit center" type="submit" value="Post">
            <a class="back center" href="{{route('posts.index')}}">Back</a>
        </form>
    </div>
</body>
@endsection