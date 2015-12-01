<?php

namespace App\Http\Controllers;

use App\Http\Model\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{

    public function __construct() {
//        $this->middleware('');
        parent::__construct();
    }

    public function index()
    {
//        $action = Route::currentRouteAction();
//        var_dump($action);die();
//        abort(404);
//        $articles = Article::all();
        $articles = Article::latest()->get();
        $metaTitle = 'Articles';
        return view('article.index', compact('articles', 'metaTitle'));
    }

    public function show(Article $article)
    {
//        $article = Article::find($id);
        if(is_null($article)) {
            abort(404);
        }
        $metaTitle = $article->title;
        return view('article.show', compact('article', 'metaTitle'));
    }

    public function create()
    {
        $metaTitle = 'Create Article';
        return view('article.create', compact('metaTitle'));
    }

    public function store()
    {
        $data = Request::all();
        $data['published_at'] = Carbon::now();
        $a = Article::create($data);
//        var_dump($a);die();
        return redirect()->route('article::list');
    }

}
