<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;

class UnfavoriteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Book $book)
    {
        auth()->user()->books()->detach($book);
        
        return redirect()->back();
    }
}
