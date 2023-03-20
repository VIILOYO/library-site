<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if(isset($request->search)) {
            $books = DB::table('books')
                        ->where('is_available', 1)
                        ->where('title', 'like', "%{$request->search}%")
                        ->orWhere('description', 'like', "%{$request->search}%")
                        ->paginate(10);
        } else {
            $books = Book::where('is_available', 1)->paginate(10);
        }

        return view('books.index', compact('books', 'request'));
    }
}
