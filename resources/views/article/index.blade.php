@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css"/>
@endsection

@section('content')
<h1> 상품 목록() <h1>
<ul>
			@foreach($articles as $article)
				<a href="/aricles/{{ $article->id }}">
					<li class="border my-3 p-3">Title: {{ $article->title }} <small class="float-right">Created at {{ $article->created_at }}</small></li>
				</a>
			@endforeach
	</ul>


  
@endsection
