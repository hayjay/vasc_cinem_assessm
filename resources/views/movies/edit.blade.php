@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.feedback')
		<div class="col-sm-12 card">
			<div class="card-body ">
				<h2>Edit Cinema </h2><br>
				<form method="POST" action="{{ route('cinemas.update', $cinema->id) }}">
	                @csrf

	                <input type="hidden" name="_method" value="PUT">

	                <div class="form-group row">
	                    <label for="title" class="col-md-2 col-form-label text-md-right">Title: </label>

	                    <div class="col-md-8">
	                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') ? old('title') : $cinema->title }}" required autofocus>

	                        @if ($errors->has('title'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('title') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="address" class="col-md-2 col-form-label text-md-right">Address: </label>

	                    <div class="col-md-8">
	                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') ? old('address') : $cinema->address }}" required autofocus>

	                        @if ($errors->has('address'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('address') }}</strong>
	                            </span>
	                        @endif
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