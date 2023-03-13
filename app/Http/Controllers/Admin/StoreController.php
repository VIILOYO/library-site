<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->only('title', 'description', 'author_id', 'style_id', 'year_of_release', 'image');

        $fileName = time().$request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->store('images/books', 'public');
        $imagePath = $request->file('image')->storeAs('images', $fileName, 'public');
        $data['image'] = '/storage/' . $imagePath;

        $book = Book::firstOrCreate($data);

        return redirect()->route('books.show', $book->id);
    }
}
