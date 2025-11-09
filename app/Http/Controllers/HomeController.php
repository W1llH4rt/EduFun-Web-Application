<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get latest articles (3 articles)
        $articles = Article::with(['category', 'writer'])
            ->latest('published_date')
            ->take(3)
            ->get();

        // Get featured writer (first writer)
        $featuredWriter = Writer::first();

        return view('home', compact('articles', 'featuredWriter'));
    }
}
