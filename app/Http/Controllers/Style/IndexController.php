<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;
use App\Models\Style;
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
            $styles = DB::table('styles')
                        ->where('title', 'like', "%{$request->search}%")
                        ->paginate(9);
        } else {
            $styles = Style::paginate(9);
        }

        return view('styles.index', compact('styles', 'request'));
    }
}
