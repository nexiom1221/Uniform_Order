<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;

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
        $articles = article::All();


        return view('article.index', [
            'articles' => $articles
        ]);
    }

    public function show()
    {
        return view('article.show');
    }

    public function store(Request $request)
    {
        $request->input('title');
        $request->input('content');
        
        $articles = article::create([
            'title'=>$request->input('title'),
            'content'=>$request->input('content')
        ]);

        return redirect('/article');
    }
    
}
