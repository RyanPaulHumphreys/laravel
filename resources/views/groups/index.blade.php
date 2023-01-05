@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <div>
        <p>Groups: </p>
        <ul>
            @foreach ($groups as $group)
                <li>
                    <a href="{{route('groups.show', ['group' => $group, 'user' => Auth::user()])}}"> {{$group->name}} </a> 
                </li>
            @endforeach
        </ul>
    </div>
@endsection