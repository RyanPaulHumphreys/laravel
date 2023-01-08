@auth
    @extends('layouts.app')
@endauth

@section('title')
    <title>Timeline</title>

@section('content')

<head>
    @auth
    <div class="text-center border-green-500 border-2 rounded-full bg-lime-600 my-5 mx-auto w-36">
        <a class="bold" href="{{route('posts.create')}}">Create a Post</a>
    </div>
    @else
    @endif
</head>
<body>
    <link href="/css/output.css" rel="stylesheet">
    <link href="/css/post.css" rel="stylesheet">
    <div class="post-table container">
        
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{route('posts.show', ['post' => $post])}}">
                        <span class="w-full h-64 border-b block">
                            <div class="w-3/5 h-auto float-left">
                                <p class="bold">{{App\Models\User::find($post->user_id)->name}}</p>
                                <p class="text-left">{{$post->created_at}}
                                <p> in
                                    @if ($post->group_id != null) 
                                        {{App\Models\Group::find($post->group_id)->name}} 
                                    @else
                                        General
                                    @endif
                                </p>
                                <p>{{$post->content}}</p>
                            </div>
                            @if($post->image()->get()->first() != null)
                                <div class="float-right">
                                    <img class="w-64 h-64 p-2" src="{{$post->image()->get()->first()->src}}"/>
                                </div>
                            @endif
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
        {{$posts->links()}}
    </div>
</body>
@endsection