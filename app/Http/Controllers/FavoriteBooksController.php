<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteBooksController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $books = auth()->user()->books()->paginate(9);

        return view('favorites', compact('books'));
    }
}
