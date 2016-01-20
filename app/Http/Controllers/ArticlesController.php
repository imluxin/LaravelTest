<?php

namespace App\Http\Controllers;

use App\Http\Model\Article;
use App\Http\Requests\CreateArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
//use Request;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{

    public function __construct() {
//        $this->middleware('');
//        parent::__construct();
    }

    public function index()
    {
//        $action = Route::currentRouteAction();
//        var_dump($action);die();
//        abort(404);
//        $articles = Article::all();
//        $articles = Article::latest()->get();
//        $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Article::latest('published_at')->published()->get();
        $metaTitle = 'Articles';

        return view('article.index', compact('articles', 'metaTitle'));
    }

    public function show(Article $article)
    {
//        $article = Article::find($id);
        if(is_null($article)) {
            abort(404);
        }
//        var_dump($article->published_at);
        $metaTitle = $article->title;
        return view('article.show', compact('article', 'metaTitle'));
    }

    public function create()
    {
        $metaTitle = 'Create Article';
        return view('article.create', compact('metaTitle'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function store(CreateArticleRequest $request) // validate use Form Request
    public function store(Request $request) // validate use controller validate
    {
        // validation
        // user make:request to create a Request validate class

        // if use controller validate, we should define rules in controller
        $this->validate($request, ['title' => 'required', 'body' => 'required']);

//        $data = Request::all(); // use nothing validation
        $data = $request->all(); // if use Request validation
//        $data['published_at'] = Carbon::now();

        $a = Article::create($data);
//        var_dump($a);die();
        return redirect()->route('article::list');
    }

}
