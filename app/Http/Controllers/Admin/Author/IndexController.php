<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Book;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $author)
    {
        $books = Book::where('is_available', 1)->where('author_id', $author)->paginate(10);
        
        return view('admin.index', compact('books'));
    }
}
