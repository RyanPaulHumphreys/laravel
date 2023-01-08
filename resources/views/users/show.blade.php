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
    <div class="w-50 float-left m-10">
        <ul>
            <h1 class="text-xl">Posts: </h1>
            @foreach($posts as $post)
                <x-post-stub :post=$post/>
            @endforeach
        </ul>
    </div>
</head>

@endsection