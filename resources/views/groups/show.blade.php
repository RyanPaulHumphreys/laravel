@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <head>
        <link href="/css/output.css" rel="stylesheet">
        <div class="ml-12 mt-10 w-50 p-10 container rounded-lg border-b bg-amber-100">
            <div>
                <p class="text-xl bold">{{$group->name}}</p>
                @auth
                    @if (!App\Models\User::find(auth()->id())->groups()->where('group_id',$group->id)->exists())
                        <a href="/groups/{{$group->id}}/join" class="btn btn-success text-center border-green-500 border-2 rounded-full bg-lime-600 hover:bg-lime-200 my-5 mx-5 px-5 w-36">Join</a>
                    @else
                        <a href="/groups/{{$group->id}}/leave" class="btn btn-success text-center border-red-500 border-2 rounded-full bg-red-600 my-5 mx-5 px-5 w-36">Leave</a>
                    @endif
                @endif
                <ul> Members:
                    @foreach ($group->members()->get() as $user)
                        <li>
                            <a class="hover:underline" href="{{route('users.show', ['user' => $user])}}"> {{$user->name}} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="w-50 float-left m-10 p-5 rounded-lg bg-amber-200">
            @if($posts->count() == 0)
                <h1 class="text-xl">No posts in this group </h1>

            @else
                <ul>
                    <h1 class="text-xl">Posts: </h1>
                    @foreach($posts as $post)
                        <x-post-stub :post=$post/>
                    @endforeach
                </ul>
            @endif
        </div>
        @livewireStyles
    </head>
    <body>
        @livewireScripts
    </body>

@endsection