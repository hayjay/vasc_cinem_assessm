@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.feedback')
		@forelse ($showtimes as $showtime)
			<div class="col-sm-12 card">
				<div class="card-body">
					<b>Title: </b>
					<a href="{{ route('showtimes.show', $showtime->id) }}"><h3>{{ $showtime->title }}</h3></a>
					<b>Day: </b>
					<p>{{ $showtime->day }}</p>
					<b>Start Time: </b>
					<p>{{ $showtime->start_time }} <small>(24 hrs)</small></p>
					<b>Stop Time: </b>
					<p>{{ $showtime->stop_time }} <small>(24 hrs)</small></p>
					@if(auth()->check())
						<form  method="post" action="{{ route('showtimes.destroy', $showtime->id) }}">
							<input type="hidden" name="_method" value="DELETE">
							<input type="submit" value="Delete Movie" class="btn btn-danger btn-sm">
							{{ csrf_field() }}
						</form>
						<br>
						<a href="{{ route('showtimes.edit', $showtime->id) }}"><button class="btn btn-primary btn-sm">Edit</button></a>
					@endif
				</div>
			</div>
			<br>
		@empty
			<div><h4 class="text-danger">No Showtimes availbale yet!</h4></div>
		@endforelse
	</div>
@endsection