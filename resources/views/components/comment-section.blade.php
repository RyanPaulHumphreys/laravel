<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="h-full m-5 p-5 border bg-amber-200">
        <link href="/css/output.css" rel="stylesheet">
        <h2>Comments: </h2>
        @auth
        <form method="POST" action="{{route('comments.store')}}">
            @csrf
            <p>Add a Comment</p>
            <textarea class="w-1/4 h-1/2" id="content" name="content" placeholder="Write here...">  </textarea>
            <input type="hidden" value={{$post->id}} id="post_id" name="post_id">
            <input class="submit" type="submit" value="Post">
        </form>
        @endauth
        <ul>
            @foreach ($comments as $comment)
                <x-comment :comment=$comment/>
            @endforeach
        </ul>
    </div>
</div>