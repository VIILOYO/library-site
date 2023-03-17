<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;
use App\Models\Style;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Style $style)
    {
        $books = $style->books()->paginate(10);

        return view('books.index', compact('books', 'style'));
    }
}
