<?php

namespace App\Http\Controllers;

use App\Models\Post;


class PostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post)
    {
        return view('show', compact('post'));
    }
}
