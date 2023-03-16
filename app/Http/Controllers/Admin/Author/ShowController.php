<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Author $author)
    {
        $books = Book::where('author_id', $author->id)->paginate(10);

        return view('admin.index', compact('books', 'author'));
    }
}
