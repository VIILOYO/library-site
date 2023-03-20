<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
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
            $authors = DB::table('authors')
                        ->where('first_name', 'like', "%{$request->search}%")
                        ->orWhere('last_name', 'like', "%{$request->search}%")
                        ->paginate(9);
        } else {
            $authors = Author::paginate(9);
        }

        return view('authors.index', compact('authors', 'request'));
    }
}
