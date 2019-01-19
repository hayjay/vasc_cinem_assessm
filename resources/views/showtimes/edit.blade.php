@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.feedback')
		<div class="col-sm-12 card">
			<div class="card-body ">
				<h2>Edit ShowTime </h2><br>
				<form method="POST" action="{{ route('showtimes.update', $showtime->id) }}">
	                @csrf

	                <input type="hidden" name="_method" value="PUT">

	                <div class="form-group row">
	                    <label for="title" class="col-md-2 col-form-label text-md-right">Title: </label>

	                    <div class="col-md-8">
	                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') ? old('title') : $showtime->title }}" required autofocus>

	                        @if ($errors->has('title'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('title') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="start_time" class="col-md-2 col-form-label text-md-right">Start Time: </label>

	                    <div class="col-md-8">
	                        <input id="start_time" type="time" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" value="{{ old('start_time') ?  old('start_time') : $showtime->start_time  }}" required autofocus>

	                        @if ($errors->has('start_time'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('start_time') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="stop_time" class="col-md-2 col-form-label text-md-right">Stop Time: </label>

	                    <div class="col-md-8">
	                        <input id="stop_time" type="time" class="form-control{{ $errors->has('stop_time') ? ' is-invalid' : '' }}" name="stop_time" value="{{ old('stop_time') ?  old('stop_time') : $showtime->stop_time }}" required autofocus>

	                        @if ($errors->has('stop_time'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('stop_time') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>


	                <div class="form-group row">
						<label for="day" class="col-md-2 col-form-label text-md-right">Select Day:</label>
						<div class="col-md-8">
							<select class="form-control" id="day" name="day">
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>
								<option value="Saturday">Saturday</option>
								<option value="Sunday">Sunday</option>
							</select>
						</div>
					</div>


					<div class="form-group row">
						<label for="day" class="col-md-2 col-form-label text-md-right">Select Cinema:</label>
						<div class="col-md-8">
							<select class="form-control" id="day" name="cinema_id">
								@foreach($cinemas as $cinema)
	                        		<option value="{{ $cinema->id }}">{{ $cinema->title }}</option>
	                        	@endforeach
							</select>
						</div>
					</div>

	                <div class="form-group row mb-0">
	                    <div class="col-md-8 offset-md-2">
	                        <button type="submit" class="btn btn-success">Edit</button>
	                    </div>
	                </div>
	            </form>
			</div>
		</div>
	</div>
@endsection