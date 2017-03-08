@extends ('layout/layout')

@section('content')
	<div class="container" style="padding-top:20px">
		<iframe width="560" height="315" 
			src="{{ $article->url }}?autoplay=0" frameborder="0" allowfullscreen>
		</iframe> 
		<h4>{{ $article->title }}</h4>
		<p>Dato: {{ $article->date }}</p>
		@foreach ($categories as $cat)
			@if ($cat->category == $article->category)
			<p>Kategorier: <a href="/{{ $cat->tag }}">{{ $article->category }}</a></p>
			@endif
		@endforeach
		<p>{{ $article->description }}</p>
	</div>
	@if (Auth::check())
		<a href="/video/{{ $article->id }}/edit" class="btn btn-primary" role="button">Endre</a>
		<a href="/video/{{ $article->id }}/delete" class="btn btn-primary" role="button">Slett</a>
	@endif
@endsection