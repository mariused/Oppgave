@extends ('layout/layout')

@section('content')
	<div class="row marketing">
        <div class="col-lg-4">
			<!--@foreach ($articles as $article)
				<h4><a href="/video/{{ $article->id }}">{{ $article->title }}</a></h4>
				<p>{{ $article->description }}</p>
			@endforeach 
			@for ($i = 0; $i<count($articles); $i++)
				<h4><a href="/video/{{ $articles[$i]->id }}">{{ $articles[$i]->title }}</a></h4>
				<p>{{ $articles[$i]->description }}</p>
				@if($i == 2)
					</div><div class="col-lg-4">
				@endif
				@if($i == 5)
					</div><div class="col-lg-4">
				@endif
			@endfor -->
				
				
				@for ($i = 0; $i<count($articles); $i++)
					<?php
						$url = $articles[$i]->url;
						if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)){
							$video_id = $match[1];
						}
					?>
					
					<div class="list-group" style="width:200px">
						<a href="/video/{{ $articles[$i]->id }}" class="list-group-item" style="height:120px; width:220px; background-image:url('https://img.youtube.com/vi/{{ $video_id }}/maxresdefault.jpg'); background-size:220px 120px">
						<!--<h5 class="list-group-item-heading">{{ $articles[$i]->title }}</h5> -->
						<!--<p class="list-group-item-text">{{ substr($articles[$i]->description, 0, 50) }}..</p> -->
						<p class="list-group-item-text"><h4 style="color: white;text-shadow: 2px 2px 4px #000000;">{{ $articles[$i]->title }}</h4></p>
						</a>
					</div>
					</div><div class="col-lg-4">
				@endfor
			<div class="container">
				{{ $articles->links() }}
			</div>
		</div>
		
</div>
@endsection
	
