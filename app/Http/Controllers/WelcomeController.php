<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取当前环境
        $env = app()->environment();
        return view('welcome.index');
    }

    public function hello($name)
    {
        $lastname = 'China';
        return view('welcome.hello', compact('name', 'lastname'));
    }
}
