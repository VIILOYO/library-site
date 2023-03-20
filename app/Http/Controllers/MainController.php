<?php

namespace App\Http\Controllers;

use App\Models\Post;


class MainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $posts = Post::paginate(10);

        return view('index', compact('posts'));
    }
}
