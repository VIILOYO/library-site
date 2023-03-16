<?php

namespace App\Http\Controllers\Admin\Style;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Style;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Style $style)
    {
        $books = Book::where('style_id', $style->id)->paginate(10);

        return view('admin.index', compact('books', 'style'));
    }
}
