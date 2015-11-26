<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $metaTitle = 'Articles';
        return view('article.index', compact('articles', 'metaTitle'));
    }

    public function show($id)
    {
        $article = Article::find($id);
        if(is_null($article)) {
            abort(404);
        }
        $metaTitle = $article->title;
        return view('article.show', compact('article', 'metaTitle'));
    }

}
