@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.feedback')
		<div class="col-sm-12 card">
			<div class="card-body ">
				<b>Title: </b>
				<a href="{{ route('showtimes.show', $showtime->id) }}"><h3>{{ $showtime->title }}</h3></a>
				<b>Day: </b>
				<p>{{ $showtime->day }}</p>
				<b>Start Time: </b>
				<p>{{ $showtime->start_time }}</p>
				<b>Stop Time: </b>
				<p>{{ $showtime->stop_time }}</p>
				@if(auth()->check())
					<form  method="post" action="{{ route('showtimes.destroy', $showtime->id) }}">
						<input type="hidden" name="_method" value="DELETE">
						<input type="submit" value="Delete Movie" class="btn btn-danger  btn-sm">
						{{ csrf_field() }}
					</form>
					<br>
					<a href="{{ route('showtimes.edit', $showtime->id) }}"><button class="btn btn-primary btn-sm">Edit</button></a>
				@endif
			</div>
		</div>
		<br>
		<h3>Movie</h3>
		<hr>
		<div class="col-sm-12 card">
			@if($showtime->movie)
				<div class="card-body ">
					<b>Title: </b>
					<a href="{{ route('movies.show', $showtime->movie->id) }}"><h4>{{ $showtime->movie->title }}</h4></a>
					<b>Release Date: </b>
					<p>{{ $showtime->movie->release_date }}</p>
				</div>
			@else
				<div class="card-body ">
					<p>No Movie assigned yet</p>
				</div>
			@endif
		</div>

		<br>
		<h3>Cinema</h3>
		<hr>
		<div class="col-sm-12 card">
			@if($showtime->cinema)
				<div class="card-body ">
					<b>Title: </b>
					<a href="{{ route('cinemas.show', $showtime->cinema->id) }}"><h4>{{ $showtime->cinema->title }}</h4></a>
					<b>Address: </b>
					<p>{{ $showtime->address }}</p>
				</div>
			@else
				<div class="card-body ">
					<p>No Cinema assigned yet</p>
				</div>
			@endif
		</div>
	</div>
@endsection