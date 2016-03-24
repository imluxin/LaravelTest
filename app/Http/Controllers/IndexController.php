<?php
namespace App\Http\Controllers;

class IndexController extends Controller {

    public function index() {
        echo '欢迎来到首页！';
    }

    public function contact()
    {
        return view('index.contact');
    }

}