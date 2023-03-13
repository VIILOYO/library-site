<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Style;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $authors = Author::all();
        $styles = Style::all();
        
        return view('admin.create', compact('authors', 'styles'));
    }
}
