<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $books = Book::where('is_available', '1')->paginate(10);
    
        return view('admin.index', compact('books'));
    }
}
