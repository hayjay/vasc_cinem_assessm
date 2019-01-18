@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.feedback')
		<div class="col-sm-12 card">
			<div class="card-body ">
				<h2>Create Showtime </h2><br>
				<form method="POST" action="{{ route('cinemas.store') }}">
	                @csrf

	                <div class="form-group row">
	                    <label for="title" class="col-md-2 col-form-label text-md-right">Title: </label>

	                    <div class="col-md-8">
	                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

	                        @if ($errors->has('title'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('title') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="start_time" class="col-md-2 col-form-label text-md-right">Address: </label>

	                    <div class="col-md-8">
	                        <input id="start_time" type="timr" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" value="{{ old('start_time') }}" required autofocus>

	                        @if ($errors->has('start_time'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('start_time') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="stop_time" class="col-md-2 col-form-label text-md-right">Address: </label>

	                    <div class="col-md-8">
	                        <input id="stop_time" type="timr" class="form-control{{ $errors->has('stop_time') ? ' is-invalid' : '' }}" name="stop_time" value="{{ old('stop_time') }}" required autofocus>

	                        @if ($errors->has('stop_time'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('stop_time') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>


	                <div class="form-group row">
	                    <label for="stop_time" class="col-md-2 col-form-label text-md-right">Address: </label>

	                    <div class="col-md-8">
	                        <select name="cinema_id" value={{ old('cinema_id') }} class="form-control">
	                        	@foreach($cinemas as $cinema)
	                        		<option class="form-control" value="{{ $cinema->id }}">{{ $cinema->title }}</option>
	                        	@endforeach
	                        </select>

	                        @if ($errors->has('cinema_id'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('cinema_id') }}</strong>
	                            </span>
	                        @endif
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