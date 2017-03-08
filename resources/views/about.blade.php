@extends ('layout/layout')


@section('content')
<div class="row marketing">
        <div class="col-lg-6">
			<!--@foreach ($articles as $article)
				<h4><a href="/video/{{ $article->id }}">{{ $article->title }}</a></h4>
				<p>{{ $article->description }}</p>
			@endforeach -->
			@for ($i = 0; $i<count($articles); $i++)
				<h4><a href="/video/{{ $articles[$i]->id }}">{{ $articles[$i]->title }}</a></h4>
				<p>{{ $articles[$i]->description }}</p>
				@if($i == 2)
					</div><div class="col-lg-6">
				@endif
			@endfor
		</div>
</div>
@endsection