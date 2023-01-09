@extends('layouts.app')

@section('title', 'User')
    <title>User {{$user->name}}</title>

@section('content')
<head>
    <link href="/css/output.css" rel="stylesheet">
    <link href="/css/post.css" rel="stylesheet">
    <div class="w-3/4 h-2/4 bg-amber-200 mx-auto mt-8">
        <div class="w-2/4 m-5 float-left">
            <ul>
                <li class="bold text-xl">{{$user->name}}</li>
                <li>Registered: {{$user->created_at}}</li>
            </ul>

            <ul>
                <h2>Groups: </h2>
                @foreach($user->groups()->get() as $group)
                    <li><a class="hover:underline bold" href="{{route('groups.show',['group' => $group])}}">{{$group->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="w-1/4 float-right mr-10">
        </div>
    </div>
    <div class="w-1/2 float-left m-10">
        <ul class="h-1/2 m-5 bg-amber-200">
            <h1 class="text-xl">Posts: </h1>
            @if($posts->count() == 0)
                <h1 class="text-xl">No posts yet </h1>
            @else
                @foreach($posts as $post)
                    <x-post-stub :post=$post/>
                @endforeach
            @endif
        </ul>
    </div>

    <div class="w-2/5 float-right m-10">
        <ul>
            <x-comment-section :comments=$comments :post=null/>
        </ul>
    </div>
</head>

@endsection