<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($slug)
    {
        $article = Article::with(['category', 'writer'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('article.show', compact('article'));
    }
}
