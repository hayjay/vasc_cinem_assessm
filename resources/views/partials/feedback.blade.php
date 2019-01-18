@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><hr>
@endif
@if (session('success'))
	<div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div><hr>
@endif
@if (session('info'))
	<div class="alert alert-info">
        <p>{{ session('info') }}</p>
    </div><hr>
@endif
@if (session('error'))
	<div class="alert alert-warning">
        <p>{{ session('error') }}</p>
    </div><hr>
@endif