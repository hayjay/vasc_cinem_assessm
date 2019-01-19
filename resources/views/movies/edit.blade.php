@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.feedback')
		<div class="col-sm-12 card">
			<div class="card-body ">
				<h2>Edit Movie </h2><br>
				<form method="POST" action="{{ route('movies.update', $movie->id) }}">
	                @csrf

	                <input type="hidden" name="_method" value="PUT">


	                <div class="form-group row">
	                    <label for="title" class="col-md-2 col-form-label text-md-right">Title: </label>

	                    <div class="col-md-8">
	                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') ?  old('title') : $movie->title }}" required autofocus>

	                        @if ($errors->has('title'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('title') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="description" class="col-md-2 col-form-label text-md-right">Description: </label>

	                    <div class="col-md-8">
	                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" >{{ old('description') ?  old('description') : $movie->description }}</textarea>

	                        @if ($errors->has('description'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('description') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="release_date" class="col-md-2 col-form-label text-md-right">Release Date: </label>

	                    <div class="col-md-8">
	                        <input id="release_date" type="date" class="form-control{{ $errors->has('release_date') ? ' is-invalid' : '' }}" name="release_date" value="{{ old('release_date') ?  old('release_date') : $movie->release_date }}" required>

	                        @if ($errors->has('release_date'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('release_date') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="description" class="col-md-2 col-form-label text-md-right">Select Cinemas: </label>

	                    <div class="col-md-8">
	                    	@foreach($cinemas as $cinema)
	                        	<div class="col-md-12">
	                        		<label class="form-check-label"><input  value="{{ $cinema->id }}" type="checkbox" class="form-check-input" name="cinemas[]"> {{ $cinema->title }} <small>({{ $cinema->address }})</small></label>
	                        	</div>
	                    	@endforeach
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="description" class="col-md-2 col-form-label text-md-right">Select Showtimes: </label>

	                    <div class="col-md-8">
	                    	@foreach($showtimes as $showtime)
	                    		<div class="col-md-12">
	                        		<label class="form-check-label"><input value="{{ $showtime->id }}" type="checkbox" class="form-check-input" name="showtimes[]"> {{ $showtime->title }} - {{ $showtime->start_time }} <small>(24 hrs)</small></label>
	                        	</div>
	                    	@endforeach
	                    </div>
	                </div>

	                <div class="form-group row mb-0">
	                    <div class="col-md-8 offset-md-2">
	                        <button type="submit" class="btn btn-success">Create</button>
	                    </div>
	                </div>
	            </form>
			</div>
		</div>
	</div>
@endsection