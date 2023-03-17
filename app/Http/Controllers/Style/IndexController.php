<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;
use App\Models\Style;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $styles = Style::paginate(10);

        return view('styles.index', compact('styles'));
    }
}
