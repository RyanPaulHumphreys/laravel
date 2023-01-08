@auth
    @extends('layouts.app')
@endauth

@section('title')
    <title>Timeline</title>

@section('content')

<head>
    @auth
    <div class="text-center border-green-500 border-2 rounded-full bg-lime-600 hover:bg-lime-200 my-5 mx-auto w-36">
        <a class="bold" href="{{route('posts.create')}}">Create a Post</a>
    </div>
    @else
    @endif
</head>
<body>
    <link href="/css/output.css" rel="stylesheet">
    <link href="/css/post.css" rel="stylesheet">
    <div class="mx-auto p-2 rounded-lg border-amber-700 border-4 bg-amber-100 container">
        <ul>
            @foreach ($posts as $post)
                <x-post-stub :post=$post/>
            @endforeach
        </ul>
        {{$posts->links()}}
    </div>
</body>
@endsection