@extends ('layout/layout')

@section('content')
	<div class="row marketing">
		<div class="col-lg-6">
			<h1>Endre kategori</h1>
			
			<form method="POST" action="/kategori/{{ $category->id }}">
				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="category">Kategorinavn:</label>
					<input type="text" value="{{ $category->category }}" class="form-control" id="category" name="category" required>
				</div>
				
				<div class="form-group"> 
					<label for="tag">Kategoritag(uten æøå, mellomrom og andre ting):</label>
					<input type="text" value="{{ $category->tag }}" class="form-control" id="tag" name="tag" required>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Endre</button>
				</div>
				@include('layout.errors')
			</form>

		</div>
	</div>
@endsection