<script>
    $('#comment-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/comments',
            data: $(this).serialize(),
            success: function(response) {
                console.log(response.comment);
            }
        });
    });
</script>

<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="h-full m-5 p-5 border bg-amber-200">
        <link href="/css/output.css" rel="stylesheet">
        <h2>Comments: </h2>
        @auth
            @if($post != null)
                <form method="POST" id="comment-form" action="/comments">
                    @csrf
                    <p>Add a Comment</p>
                    <textarea class="w-1/4 h-1/2" id="content" name="content" placeholder="Write here...">  </textarea>
                    <input type="hidden" value={{$post->id}} id="post_id" name="post_id">
                    <input class="submit" type="submit" value="Post">
                </form>
            @endif
        @endauth
        <ul>
            @foreach ($comments as $comment)
            @if($post == null)
            <a class="border" href="{{route('posts.show', ['post' => App\Models\Post::find($comment->post_id)])}}">Go to post</a>
            @endif
            <x-comment :comment=$comment/>
            @endforeach
        </ul>
    </div>
</div>