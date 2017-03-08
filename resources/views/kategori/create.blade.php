@extends ('layout/layout')

@section('content')
	<div class="row marketing">
		<div class="col-lg-6">
			<h1>Legg til kategori</h1>
			
			<form method="POST" action="/kategori">
				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="category">Kategorinavn:</label>
					<input type="text" class="form-control" id="category" name="category" required>
				</div>
				
				<div class="form-group"> 
					<label for="tag">Kategoritag(eks vaerogfoere i stedet for Vær- og føre):</label>
					<input type="text" class="form-control" id="tag" name="tag" required>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Lagre</button>
				</div>
				@include('layout.errors')
			</form>

		</div>
	</div>
@endsection