@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <head>
        <link href="/css/output.css" rel="stylesheet">
        <p class="text-center text-xl">Groups: </p>
        <div class="mx-auto w-50 container">
            <ul class="divide-y border-4">
                @foreach ($groups as $group)
                    <li class="text-center h-16 t-xl">
                        <a class="bold" href="{{route('groups.show', ['group' => $group, 'user' => Auth::user()])}}"> {{$group->name}} </a>
                        <p>{{$group->members()->count()}} members</p> 
                    </li>
                @endforeach
            </ul>
        </div>
        @livewireStyles
    </head>
    <body>
        @livewireScripts
    </body>

@endsection