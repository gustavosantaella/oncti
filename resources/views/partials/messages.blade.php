@if ($errors->any())
<div class="alert alert-danger rounded-top rounded-right rounded-left rounded-bottom p-4">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>

@elseif(session('message'))
<div class="alert alert-{{ session('type') }} rounded-top rounded-right rounded-left rounded-bottom p-4">
	<ul>

		<li>{{ session('message') }}</li>

	</ul>
</div>
@endif