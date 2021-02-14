@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css"/>
@endsection

@section('content')
<h1> 내 주문이력 <h1>


<div class="px-64">
		<h1 class="font-bold text-3xl">List</h1>
	<ul>
			@foreach($articles as $article)

			@if(Auth::user()->id == $article->user_id)
				<a href="/article/{{ $article->id }}">
					<li class="border my-3 p-3">Title: {{ $article->title }} 
					<small class="float-right">Created at {{ $article->created_at }}</small></li>
				</a>
			@endif

			@endforeach
	</ul>

</div>

  
@endsection
