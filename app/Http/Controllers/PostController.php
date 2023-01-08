<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check())
        {
            $user = User::find(Auth::id());
            $groups = $user->groups()->get()->toArray();
        }
        else
        {
            $groups = [];
        }

        $posts = Post::whereIn('group_id', array_column($groups,'id'))->orWhere('group_id', null);
        
        return view('posts.index', ['posts' => $posts->orderByDesc('created_at')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validData = $request->validate(
            [
                'content' => 'required|max:255',
                'group_id' => 'nullable|integer',
                'image' => 'nullable|image'
            ]
        );
        
        $p = new Post;
        $p->content = $validData['content'];
        $p->group_id = $validData['group_id'];
        $p->user_id = auth()->id();
        $p->save();

        if($request['image'] != null)
        {
            $imgName = time() . '.' . $request['image']->extension();

            $request->image->move(public_path('images'), $imgName);

            $img = new Image;
            $img->src = asset('images')."/".$imgName;
            $img->mime_type = $request->file('image')->getClientOriginalExtension();
            $img->post_id = $p->id;
            $img->save();

            $p->image_id = $img->id;
        }
        
        session()->flash('message', 'Post submitted');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $comments = Comment::all()->where('post_id', $post->id);
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
