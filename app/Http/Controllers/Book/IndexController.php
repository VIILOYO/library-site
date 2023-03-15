<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($author = null)
    {
        if($author !== null) {
            $books = Book::where('is_available', 1)->where('author_id', $author)->paginate(10);
        } else {
            $books = Book::where('is_available', 1)->paginate(10);
        }

        return view('books.index', compact('books'));
    }
}
