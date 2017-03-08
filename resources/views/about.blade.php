@extends ('layout/layout')

@section('content')
<?php
	$emp = 0;
?>

	<div class="row marketing">
		@foreach ($articles as $article)
			@if($article->emphasise == 1)
				
				<?php
					$emp = $article->id;
					$url = $article->url;
					if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)){
						$video_id = $match[1];
					}
				?>
				<div class="col-md-9">
					<div class="list-group" style="width:685px">
							<a href="/video/{{ $article->id }}" class="list-group-item" style="height:300px; width:685px; background-image:url('https://img.youtube.com/vi/{{ $video_id }}/maxresdefault.jpg'); background-size:685px 300px">
							<p class="list-group-item-text"><h4 style="color: white;text-shadow: 2px 2px 4px #000000;">{{ $article->title }}</h4></p>
							</a>
					</div>
				</div>
			@endif
			
		@endforeach	
		<div class="col-lg-4">
		@foreach ($articles as $article)
			@if($emp == $article->id)
				
			@else
				<?php
					$url = $article->url;
					if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)){
						$video_id = $match[1];
					}
				?>
			
				<div class="list-group" style="width:200px">
					<a href="/video/{{ $article->id }}" class="list-group-item" style="height:120px; width:220px; background-image:url('https://img.youtube.com/vi/{{ $video_id }}/maxresdefault.jpg'); background-size:220px 120px">
					<p class="list-group-item-text"><h4 style="color: white;text-shadow: 2px 2px 4px #000000;">{{ $article->title }}</h4></p>
					</a>
				</div>
				</div><div class="col-lg-4">
			@endif
			
		@endforeach
		</div></div>
		<div class="footer">
		{{ $articles->links() }}
		
</div>
@endsection
	
