<?php

namespace App\Http\Controllers\Admin\Style;

use App\Http\Controllers\Controller;


class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('admin.style.create');
    }
}
