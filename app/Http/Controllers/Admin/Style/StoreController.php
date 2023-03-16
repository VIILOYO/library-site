<?php

namespace App\Http\Controllers\Admin\Style;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Style\StoreRequest;
use App\Models\Style;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $style = Style::firstOrCreate($data);

        return redirect()->route('admin.styles.show', compact('style'));
    }
}
