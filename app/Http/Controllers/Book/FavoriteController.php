<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;

class FavoriteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Book $book)
    {
        auth()->user()->books()->attach($book);
        
        return redirect()->back();
    }
}
