<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <li>
        <a href="{{route('posts.show', ['post' => $post])}}">
            <span class="w-full h-64 border-b block bg-amber-200 hover:bg-amber-100">
                <div class="w-3/5 h-auto p-5 float-left">
                    <p class="hover:underline bold" href="{{route('users.show', ['user' => $post->user_id])}}">{{App\Models\User::find($post->user_id)->name}}</p>
                    <p class="text-left">{{$post->created_at}}
                    <p> in
                        @if ($post->group_id != null) 
                            {{App\Models\Group::find($post->group_id)->name}} 
                        @else
                            General
                        @endif
                    </p>
                    <p>{{$post->content}}</p>
                </div>
                @if($post->image()->get()->first() != null)
                    <div class="float-right">
                        <img class="w-64 h-64 p-2" src="{{$post->image()->get()->first()->src}}"/>
                    </div>
                @endif
            </span>
        </a>
    </li>
</div>