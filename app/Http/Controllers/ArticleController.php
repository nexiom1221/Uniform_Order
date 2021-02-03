<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }
    
    public function edit()
    {
        return view('article.edit');
    }

    public function index()
    {
        return view('article.index');
    }

    public function show()
    {
        return view('article.show');
    }
    
}
