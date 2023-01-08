@extends('layouts.app')

@section('title', 'Post')
    <title>Post by {{App\Models\User::find($post->user_id)->name}}</title>

@section('content')
<div>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    
    <script>
       function getMessage() {
          $.ajax({
             type:'POST',
             url:'/getmsg',
             data:'_token = <?php echo csrf_token() ?>',
             success:function(data) {
                $("#msg").html(data.msg);
             }
          });
       }
    </script>
    
    <link href="/css/output.css" rel="stylesheet">
    <link href="/css/post.css" rel="stylesheet">
    <div class="w-full h-2/4 bg-amber-100 border m-5">
        <div class="w-2/4 m-5 float-left">
            <ul>
                <li><a class="bold hover:underline" href="{{route('users.show', ['user' =>App\Models\User::find($post->user_id)])}}">{{App\Models\User::find($post->user_id)->name}}</a></li>
                <li>Posted: {{$post->created_at}}</li>
                @if ($post->group_id != null)
                    <li> Group: {{App\Models\Group::find($post->group_id)->name}}</li>
                @endif
                <li>{{$post->content}}</li>
                @auth
                    @if($post->user_id == auth()->id() || auth()->user()->role == "admin")
                    <form  action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" class="back" value="delete"/>
                    </form>

                    <form  action="{{ route('posts.edit', $post->id) }}" method="GET">
                        @csrf
                        @method('patch')
                        <input type="submit" class="back bg-amber-900" value="edit"/>
                    </form>
                    @endif
                @endauth
            </ul>
        </div>
        @if($post->image()->get()->first() != null)
            <div class="w-64 h-auto float-right mr-64 mt-10 rounded-lg bg-amber-700">
                    <img class="m-auto w-auto h-64" src="{{$post->image()->get()->first()->src}}"/>   
            </div>
        @endif
    </div>
</div>
<div class="h-full">
    <x-comment-section :comments=$comments :post=$post/>
</div>
@endsection