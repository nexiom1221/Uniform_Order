@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css"/>
@endsection

@section('content')
<h1> 상품주문 폼 (상세주문페이지로 이동시 나오는 폼) <h1>

<div class="px-64">
		<h1 class="font-bold text-3xl">Edit Task</h1>
		<form action="/article/{{ $article->id }}" method="POST">
    {{ method_field('put') }}
    {{ csrf_field() }}
			<label class="block" for="title">Title</label>
			<input class="border border-gray-800 w-full @error('title') border border-red-700 @enderror" type="text" name="title" id="title" required value="{{ old('title') ? old('title') : $article->title }}"><br>
      
			<label class="block" for="content">Content</label>
      <textarea class="border border-gray-800 w-full @error('content') border border-red-700 @enderror" name="content" id="content" cols="30" rows="10" required>{{ old('content') ? old('content') : $article->content }}</textarea><br>
			
			<button class="bg-blue-600 text-white px-4 py-2 float-right">Submit</button>

		</form>
	</div>
@endsection
