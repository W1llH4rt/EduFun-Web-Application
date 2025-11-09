<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PopularController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 3;

        $articles = Article::with(['category', 'writer'])
            ->where('is_popular', true)
            ->latest('published_date')
            ->paginate($perPage);

        return view('popular', compact('articles'));
    }
}
