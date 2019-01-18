@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.feedback')
		@forelse ($showtimes as $showtime)
			<div class="col-sm-12 card">
				<div class="card-body">
					<b>Title: </b>
					<a href="{{ route('showtimes.show', $showtime->id) }}"><h3>{{ $showtime->title }}</h3></a>
					<b>Start Time: </b>
					<p>{{ $showtime->start_time }}</p>
					<b>Stop Time: </b>
					<p>{{ $showtime->stop_time }}</p>
					@if(auth()->check())
						<form  method="post" action="{{ route('showtimes.destroy', $showtimes->id) }}">
							<input type="hidden" name="_method" value="DELETE">
							<input type="submit" value="Delete Movie" class="btn btn-danger">
							{{ csrf_field() }}
						</form>
						<a href="{{ route('showtimes.edit', $showtimes->id) }}"><button class="btn btn-primary">Edit</button></a>
					@endif
				</div>
			</div>
			<br>
		@empty
			<div><h4 class="text-danger">Showtimes availbale yet!</h4></div>
		@endforelse
	</div>
@endsection