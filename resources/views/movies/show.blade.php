@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.feedback')
		<div class="col-sm-12 card">
			<div class="card-body ">
				<b>Title: </b>
				<a href="{{ route('movies.show', $movie->id) }}"><h3>{{ $movie->title }}</h3></a>
				<b>Release Date: </b>
				<p>{{ $movie->release_date }}</p>
				<b>Description: </b>
				<p>{{ $movie->description }}</p>
				@if(auth()->check())
					<form  method="post" action="{{ route('movies.destroy', $movie->id) }}">
						<input type="hidden" name="_method" value="DELETE">
						<input type="submit" value="Delete Movie" class="btn btn-danger  btn-sm">
						{{ csrf_field() }}
					</form>
					<br>
					<a href="{{ route('movies.edit', $movie->id) }}"><button class="btn btn-primary btn-sm">Edit</button></a>
				@endif
			</div>
		</div>
		<br>
		<h3>Showtimes</h3>
		<hr>
		<div class="col-sm-12 card">
			<div class="card-body ">
				@forelse ($movie->showtimes as $showtime)
					<div class="col-sm-12 card">
						<div class="card-body ">
							<b>Title: </b>
							<a href="{{ route('showtimes.show', $showtime->id) }}"><h4>{{ $showtime->title }}</h4></a>
							<b>Day: </b>
							<p>{{ $showtime->day }}</p>
							<b>Start Time: </b>
							<p>{{ $showtime->start_time }}</p>
							<b>Cinema: </b>
							<a href="{{ route('cinemas.show', $showtime->cinema->id) }}"><p>{{ $showtime->cinema->title }}</p></a>
						</div>
					</div>
					<br>
				@empty
					<div><h4 class="text-danger">No Showtime availbale yet!</h4></div>
				@endforelse
			</div>
		</div>
	</div>
@endsection