<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Book;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Book $book)
    {
        $data = $request->validated();
        // Добавление изображения 
        $fileName = time().$request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('images', $fileName, 'public');
        $data['image'] = '/storage/' . $imagePath;
        
        $book->update($data);

        return redirect()->route('admin.show', compact('book'));
    }
}
