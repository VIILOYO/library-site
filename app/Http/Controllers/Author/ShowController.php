<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Author $author)
    {
        $books = $author->books()->paginate(10);

        return view('books.index', compact('books', 'author'));
    }
}
