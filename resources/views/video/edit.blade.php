@extends ('layout/layout')

@section('content')
<div class="content">
	<div class="row marketing">
		<div class="col-lg-6">
		<h1>Endre video</h1>
			<form method="POST" action="/video/{{ $article->id }}">
				
				{{ csrf_field() }}
			
				<div class="form-group">
					<label for="title">Tittel</label>
					<input type="text" value="{{ $article->title }}" class="form-control" id="title" name="title">
				</div>
				
				<div class="form-group">
					<label for="description">Beskrivelse</label>
					<textarea id="description" style="min-height:90px;" name="description" class="form-control">{{ $article->description }}</textarea>
				</div>
				
				<div class="form-group">
					<label for="url">Url</label>
					<input type="text" value="{{ $article->url }}" class="form-control" id="url" name="url">
				</div>
				
				<div class="form-group">
					<label for="emphasise">Fremhevet</label><br>
					@if ($article->emphasise == 1)
						<input type="radio" name="emphasise" value="1" checked="1">Ja <br>
						<input type="radio" name="emphasise" value="0">Nei
					@else
						<input type="radio" name="emphasise" value="1">Ja <br>
						<input type="radio" name="emphasise" value="0" checked="1">Nei
					@endif
				</div>
				<div class="form-group">
					<input type="date" name="date" max="{{ date('Y-m-d') }}" min="2010-12-31" value="{{ $article->date }}">
				</div>
				<label for="title">Velg kategori:</label>
				<select class="form-control" id="category" name="category">
					@foreach ($categories as $cat)
							@if ($article->category == $cat->category)
								<option value="{{ $cat->category }}" selected="true">{{ $cat->category }}</option>
							@else
								<option value="{{ $cat->category }}">{{ $cat->category }}</option>
							@endif
							
					@endforeach
				</select>

				<div class="form-group">
					<br><button type="submit" class="btn btn-primary">Endre</button>
				</div>
			</form>
			@include ('layout.errors')
		</div>
	</div>
</div>	
@endsection