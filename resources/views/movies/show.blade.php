@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.feedback')
		<div class="col-sm-12 card">
			<div class="card-body ">
				<b>Title: </b>
				<a href="{{ route('cinemas.show', $cinema->id) }}"><h3>{{ $cinema->title }}</h3></a>
				<b>Address: </b>
				<p>{{ $cinema->address }}</p>
				@if(auth()->check())
					<form  method="post" action="{{ route('cinemas.destroy', $cinema->id) }}">
						<input type="hidden" name="_method" value="DELETE">
						<input type="submit" value="Delete Movie" class="btn btn-danger  btn-sm">
						{{ csrf_field() }}
					</form>
					<br>
					<a href="{{ route('cinemas.edit', $cinema->id) }}"><button class="btn btn-primary btn-sm">Edit</button></a>
				@endif
			</div>
		</div>
		<br>
		<h3>Movies</h3>
		<hr>
		<div class="col-sm-12 card">
			@forelse ($cinema->movies as $movie)
				<div class="col-sm-12 card">
					<div class="card-body ">
						<b>Title: </b>
						<a href="{{ route('movies.show', $movie->id) }}"><h4>{{ $movie->title }}</h4></a>
						<b>Release Date: </b>
						<p>{{ $movie->release_date }}</p>
						<b>Viewings: </b>
						@forelse ($movie->showtimes->where('cinema_id', $cinema->id) as $showtime)
							<b>Title: </b>
							<h6>{{ $movie->title }}</h6>
							<b>Release Date: </b>
							<p>{{ $movie->release_date }}</p>
						@empty
							<div><h4 class="text-danger">No Showtime availbale yet!</h4></div>
						@endforelse
					</div>
				</div>
				<br>
			@empty
				<div><h4 class="text-danger">No Movies availbale yet!</h4></div>
			@endforelse
		</div>
	</div>
@endsection