@extends('layouts.app')

@section('title', 'Post')
    <title>Edit a post</title>

@section('content')
<head>
</head>
<body>
    <link href="/css/output.css" rel="stylesheet">
    <ul>
        <x-post-stub :post=$post/>
    </ul>
    
    <div class="create-post mt-8">
        @if ($errors->any())
        <div class="text-center text-red-700 bold">
            <h1>Errors:</h1>
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" enctype="multipart/form-data" class="create-post-form text-center" action="{{route('posts.update', $post->id)}}">
            @csrf
            @method('PATCH')
            <label for="content">Edit Post</label>
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
            <input class="submit center" type="submit" value="Confirm"/>
            <a class="back center" href="{{route('posts.show',['post'=>$post])}}">Cancel</a>
        </form>
    </div>
</body>
@endsection