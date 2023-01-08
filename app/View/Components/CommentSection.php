<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommentSection extends Component
{
    public $comments;
    public $post;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comments, $post)
    {
        //
        $this->comments = $comments;
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment-section', ['comments' => $this->comments, 'post' => $this->post]);
    }
}
