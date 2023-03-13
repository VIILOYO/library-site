<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id)
    {  
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
}
