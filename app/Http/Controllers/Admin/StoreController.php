<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\Book;


class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        // Добавление изображения 
        $fileName = time().$request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('images', $fileName, 'public');
        $data['image'] = '/storage/' . $imagePath;

        $book = Book::firstOrCreate($data);

        return redirect()->route('books.show', $book->id);
    }
}
