<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;

class TrashController extends Controller
{
    public function index()
    {
        $books = Book::onlyTrashed()->paginate(10);

        return view('admin.trash.index', compact('books'));
    }

    public function show(string $id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);

        return view('admin.trash.show', compact('book'));
    }

    public function restore(string $id)
    {
        Book::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.trash.index');
    }

    public function forceDelete(string $id)
    {
        Book::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('admin.trash.index');
    }
}
