<div>
    <li class="comment-content border">
        <a class="bold hover:underline" href="{{route('users.show', ['user' => App\Models\User::find($comment->user_id)])}}">{{App\Models\User::find($comment->user_id)->name}}</a> 
        <p class="w-1/2 inline"> {{$comment->content}}</p>
        @auth
            @if($comment->user_id == auth()->id() || auth()->user()->role == "admin")
            <form  action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="">
                    <input type="submit" class="underline" value="delete"/>
                </div>
            </form>
            @endif
        @endauth
    </li>
</div>