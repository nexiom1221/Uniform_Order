<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\article;


class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }
    
    public function index()
    {
        $articles = article::latest()->get();


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

    public function store()
    {
       $this->validate(request(),[
            'title' => 'required',
            'content' => 'required'
        ]); 

		
		$values = request(['title', 'content']);

		$values['user_id'] = auth()->id();
		
        
        $article = article::create(request(['title', 'content']));

        return redirect('/article/'.$article->id);
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

    public function edit(article $article)
    {
        return view('article.edit',[
            'article' => $article
        ]);
    }

    public function update(article $article)
    {

        $article->update([
            'title' => request('title'),
            'content' => request('content')
        ]);

        return redirect('/article/'.$article->id);
    }

    public function destroy(article $article)
    {
        $article->delete();

        return redirect('/article');
    }
    
}
