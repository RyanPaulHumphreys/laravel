@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <head>
        <link href="/css/output.css" rel="stylesheet">
        <div class="mx-auto w-50 container">
            <div>
                <p class="text-xl bold">{{$group->name}}</p>
                @auth
                    @if (!App\Models\User::find(auth()->id())->groups()->where('group_id',$group->id)->exists())
                        <a href="/groups/{{$group->id}}/join" class="btn btn-success">Join</a>
                    @endif
                @endif
                <ul> Members:
                    @foreach ($group->members()->get() as $user)
                        <li>
                            <a> {{$user->name}} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @livewireStyles
    </head>
    <body>
        @livewireScripts
    </body>

@endsection