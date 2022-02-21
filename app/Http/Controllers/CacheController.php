<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function cache($key)
    {
        $pageTitle = Cache::get($key);

        if ($pageTitle == 'concat') {
            abort(404);
        }

        return view('welcome', compact('pageTitle'));
    }
}
