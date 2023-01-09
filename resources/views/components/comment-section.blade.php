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
        <form method="POST" id="comment-form" action="/comments">
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