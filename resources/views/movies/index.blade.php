@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.feedback')
		@forelse ($movies as $movie)
			<div class="col-sm-12 card">
				<div class="card-body">
					<b>Title: </b>
					<a href="{{ route('movies.show', $movie->id) }}"><h3>{{ $movie->title }}</h3></a>
					<b>Date: </b>
					<p>{{ $movie->release_date }}</p>
					<b>Description: </b>
					<p>{{ $movie->description }}</p>
					@if(auth()->check())
						<form  method="post" action="{{ route('movies.destroy', $movie->id) }}">
							<input type="hidden" name="_method" value="DELETE">
							<input type="submit" value="Delete Movie" class="btn btn-danger">
							{{ csrf_field() }}
						</form>
						<a href="{{ route('movies.edit', $movie->id) }}"><button class="btn btn-primary">Edit</button></a>
					@endif
				</div>
			</div>
			<br>
		@empty
			<div><h4 class="text-danger">Movies availbale yet  yet!</h4></div>
		@endforelse
	</div>
@endsection