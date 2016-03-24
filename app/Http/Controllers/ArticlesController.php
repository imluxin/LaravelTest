<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Http\Requests\ArticleRequest;
use App\Model\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use Request;
use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ArticlesController extends Controller
{

    public function __construct()
    {
//        $this->middleware('');
//        parent::__construct();
//        $this->middleware('auth', ['only' => ['create', 'edit']]);
        $this->middleware('auth', ['except' => ['index', 'view']]);
    }

    public function index()
    {
        // 查看当前action
//        $action = Route::currentRouteAction();
//        var_dump($action);die();

        // 抛出404错误
//        abort(404);

        // 获取所有文章数据
//        $articles = Article::all();
//        var_dump($articles);die();

//        $articles = Article::latest()->get();

        // 按published_at倒序排列已到发布时间的数据
//        $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
//        $articles = Article::orderBy('published_at', 'DESC')->get();
        $articles = Article::latest('published_at')
            ->published()
            ->with('user')
            ->get();

        $tags = Tag::all(['id','name']);

        // 直接return articles为 json字符串
//        return $articles;
//var_dump($articles);
        $metaTitle = 'Articles';
        $data = array('articles' => $articles,
                      'metaTitle' => $metaTitle,
                        'tags' => $tags
        ); //compact('articles', 'metaTitle')
//        foreach($articles as $a) {
//            $b = $a->user->username;
//            var_dump($b);die();
//        }
        return view('article.index')->with($data);
    }

    public function show(Article $article)
    {
//        $article = Article::find($id);
        if(is_null($article)) {
            abort(404);
        }
//        var_dump($article->user()->get());die();
//        $user = $article->user()->first();
//        dd($article->published_at->addDays(8));
//        var_dump($article->published_at);
        $metaTitle = $article->title;
        return view('article.show')->with(compact('article', 'metaTitle', 'user'));
    }

    public function ta($id)
    {
        $tag = Tag::findOrFail($id);
        $articles = $tag->articles;
        return view('article.tags')->with(['articles' => $articles, 'tag' => $tag]);
    }

    /**
     * 查看文章
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // 第一种方法
//        $article = Article::find($id);
//        if(empty($article)) {
//            abort(404);
//        }

        // 第二种方法， 等同于每一种
        $article = Article::findOrFail($id);
//        var_dump($article);die();
        return view('article.view', array('article' => $article, 'metaTitle' => $article->title));
    }

    public function create()
    {
        $metaTitle = 'Create Article';
        return view('article.create', compact('metaTitle'));
    }

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request) // validate use Form Request
//    public function store(Request $request) // validate use controller validate
    {
        // validation
        // user make:request to create a Request validate class

        // if use controller validate, we should define rules in controller
//        $this->validate($request, ['title' => 'required|5',
//                                   'body'  => 'required']);

//        $data = Request::all(); // use nothing validation
        $data = $request->all(); // if use Request validation
//        $data['published_at'] = Carbon::now();
//var_dump($data);die();
        $article = Article::create($data);
        Auth::user()->articles()->save($article);

        $article->tags()->attach(1);
        // session flash
//        Session::flash('flash_message', '创建成功');
//        Session::flash('flash_message_important', true);
//        flash('文章创建成功');

        flash()->overlay('文章创建成功！');

       return redirect()->route('article::list');
        // or
//        return redirect('articles');
    }

    /**
     * 编辑文章
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
//        $article = Article::findOrFail($id);
        return view('article.edit', ['article' => $article]);
    }

    /**
     * 更新文章
     * @param $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Article $article, ArticleRequest $request)
    {
//        $article = Article::findOrFail($id);
        $article->update($request->all());
        $article->tags()->attach(5);
        return redirect()->route('article::list');
    }

    public function delete($id)
    {
        Article::destroy($id);
        return redirect()->route('article::list');
    }

    public function _checkAuth()
    {
        if(Auth::guest()) {
            return redirect()->route('article::list');
            exit();
        }
    }

}
