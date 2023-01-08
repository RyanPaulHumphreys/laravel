@extends('layouts.app')

@section('title', 'Post')
    <title>Create a post</title>

@section('content')
<head>
</head>
<body>
    <link href="/css/output.css" rel="stylesheet">
    <div class="border rounded-lg w-1/2 bg-amber-200 mx-auto mt-8">
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
        <form method="POST" enctype="multipart/form-data" class="create-post-form text-center" action="{{route('groups.store')}}">
            @csrf
            <label for="content">Group name</label>
            <input type="text" id="name" name="name" placeholder="Write here..." class=""/>
            <input class="submit center" type="submit" value="Create"/>
            <a class="back center" href="{{route('groups.index')}}">Back</a>
        </form>
    </div>
</body>
@endsection