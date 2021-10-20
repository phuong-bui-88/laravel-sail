<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->get('query');
        $results = Article::search($query, function ($meilisearch, $query, $options) use ($request) {
            if ($userId = $request->get('user_id')) {
                $options['filters'] = 'user_id=' . $userId;
            }

            return $meilisearch->search($query, $options);
        })->paginate(5)->withQueryString();

        return view('search', [
            'results' => $results,
            'users' => User::get(),
        ]);
    }
}
