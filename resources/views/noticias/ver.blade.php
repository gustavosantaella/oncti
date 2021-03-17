@extends('layouts.dashboadr')
@section('content')
<div class="">

	<a href="{{ route('noticia.crear') }}" class=" font-weight-bold btn btn-primary small ">Seguir agregando</a>
	@if ($noticia->state)
	<div class=" font-weight-bold alert-success rounded-top rounded-right rounded-left rounded-bottom p-2 mt-4">
		Estado: publicada.
	</div>

	@else
	<div class=" font-weight-bold alert-warning rounded-top rounded-right rounded-left rounded-bottom p-2 mt-4">
		Estado: Borrador, cambia el estado de la notica <a href="{{ route('ver.edit',$noticia->noticia_id) }}" title="Editar noticia" class="text-decoration-none">Aqui</a>.
	</div>
	@endif
</div>
<div class="card border-light">
	<div class="card-header bg-transparent border-light font-weight-bold">Noticia #{{ $noticia->noticia_id }}</div>
	<div class="card-body text-center">
		<div class="card-img img-fluid">
			<img src="{{ $noticia->url }}" class="img-fluid" alt="">			
		</div>
		<h4 class="card-title mt-4 h6">{!!date('d-m-Y') !!}</h4>
		<h4 class="card-title mt-2">{!!$noticia->titulo !!}</h4>
		<p class="card-text">
			{!! $noticia->cuerpo !!}
		</p>
	</div>
</div>
@endsection