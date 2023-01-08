@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <div>
        <link href="/css/post.css" rel="stylesheet">
        <link href="/css/output.css" rel="stylesheet">
        @auth
        <div class="text-center border-green-500 border-2 rounded-full bg-lime-600 hover:bg-lime-200  my-5 mx-auto w-36">
            <a class="bold" href="{{route('groups.create')}}">Create a Group</a>
        </div>
        @else
        @endif
        @livewireStyles
    </div>
    <div>
        <p class="text-center text-xl">Groups: </p>
        <div class="mx-auto w-50 container">
            <ul class="divide-y rounded-lg border-amber-500 bg-amber-100 border-4">
                @foreach ($groups as $group)
                    <li class="text-center h-16 t-xl">
                        <a class="bold" href="{{route('groups.show', ['group' => $group, 'user' => Auth::user()])}}"> {{$group->name}} </a>
                        <p>{{$group->members()->count()}} members</p> 
                    </li>
                @endforeach
            </ul>
            {{$groups->links()}}
        </div>
        @livewireScripts
    </div>

@endsection