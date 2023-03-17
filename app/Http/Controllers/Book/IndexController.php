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
    public function __invoke(Request $request, $author = null)
    {
        $authors = [];
        if($author !== null) {
            $books = Book::where('is_available', 1)
                            ->where('author_id', $author)
                            ->paginate(10);
                            
            $author = Author::findOrFail($author);
        } else {
            $books = Book::where('is_available', 1)->paginate(10);
        }

        if(isset($request->search)) {
            $books = DB::table('books')
                        ->where('is_available', 1)
                        ->where('title', 'like', "%{$request->search}%")
                        ->orWhere('description', 'like', "%{$request->search}%")
                        ->paginate(10);

            $authors = DB::table('authors')
                            ->where('first_name', 'like', "%{$request->search}%")
                            ->orWhere('last_name', 'like', "%{$request->search}%")
                            ->get();
        }

        return view('books.index', compact('books', 'author', 'authors'));
    }
}
