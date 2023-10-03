<?php

namespace App\Http\ViewComposers;

use App\Models\Comment;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class CommentComposer
{
    protected $comments;

    public function __construct(Comment $comments)
    {
        $this->comments = $comments;
    }

    public function compose(View $view)
    {
        return $view->with('recent_comments', $this->comments::with('user', 'post:id')->take(8)->latest()->get());
    }
}
