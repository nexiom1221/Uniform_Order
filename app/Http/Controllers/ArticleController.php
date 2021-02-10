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

    public function show(article $article)
    {
        return view('article.show', [
            'article' => $article
        ]);
    }

    public function store(Request $request)
    {
        $request->input('title');
        $request->input('content');
        
        $articles = article::create([
            'title'=>$request->input('title'),
            'email' =>$request->input('email'),
            'content'=>$request->input('content')
            
        ]);

        return redirect('/article/'.$articles->id);
    }

    public function mylist()
    {
        $admins = \App\Customer::all();

        return view('admin.index', [
            'admins' => $admins
        ]);

    }

    public function list()
    {
        return view('article.list');
    }
 
    
}
