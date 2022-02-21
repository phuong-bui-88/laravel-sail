<?php

namespace App\Support;

use App\Models\Article;

class ArticleRepository
{
    public function update($id, $data) {
        $article = Article::find($id);
        $article->update($data);
    }
}
