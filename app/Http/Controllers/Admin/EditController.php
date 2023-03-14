<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Style;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Book $book)
    {
        $styles = Style::all();
        $authors = Author::all();
        
        return view('admin.edit', compact('book', 'styles', 'authors'));
    }
}
