@extends('layout/layout')

@section('content')
	<div class="row merketing">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default" style="margin-top:50px">
				<div class="panel-heading">Reset Password</div>
				
				<div class="panel-body">
					<form method="POST" action="/password/email">
						{{ csrf_field() }}
						<label for="email">Email-adresse</label>
						<input type="email" name="email" class="form-control" value="{{ old('email') }}" required><br>
						
						<button type="submit" class="btn btn-primary">Reset passord</button>
						@include ('layout.errors')
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection