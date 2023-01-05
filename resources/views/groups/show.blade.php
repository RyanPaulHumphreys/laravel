@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <div>
        <p>{{$group->name}}</p>
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
@endsection