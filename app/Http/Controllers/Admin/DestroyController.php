<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Book $book)
    {
        $book->delete();

        return redirect()->route('admin.index');
    }
}
