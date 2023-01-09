@extends('layouts.app')

@section('title', 'Post')
    <title>Create a post</title>

@section('content')
<head>
    <script>
        $('#post-form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/posts',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response.post);
                }
            });
        });
    </script>
</head>
<body>
    <link href="/css/output.css" rel="stylesheet">
    <div class="create-post">
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
        <form method="POST" enctype="multipart/form-data" class="create-post-form text-center" action="/posts" id="post-form">
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
            <input class="submit center" type="submit" value="Post"/>
            <a class="back center" href="{{route('posts.index')}}">Back</a>
        </form>
    </div>
</body>
@endsection