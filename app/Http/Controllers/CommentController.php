<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\NewComment;

class CommentController extends Controller
{
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
                'post_id' => 'required|integer'
            ]
        );
        $c = new Comment();
        $c->content = $validData['content'];
        $c->post_id = $validData['post_id'];
        $c->user_id = auth()->id();
        $c->save();

        $u = User::find(Post::find($c->post_id)->user_id);
        $u->notify(new NewComment($validData['post_id']));


        session()->flash('message', 'Post submitted');
        return redirect()->route('posts.show', ['post' => Post::find($validData['post_id'])]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $res = Comment::find($id)->delete();
        return redirect()->back();
    }
}
