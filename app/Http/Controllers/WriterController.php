<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Writer::all();
        return view('writer.index', compact('writers'));
    }

    public function show($id)
    {
        $writer = Writer::findOrFail($id);
        $articles = $writer->articles()
            ->with(['category', 'writer'])
            ->latest('published_date')
            ->get();

        return view('writer.show', compact('writer', 'articles'));
    }
}
