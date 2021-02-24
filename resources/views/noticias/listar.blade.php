@extends('layouts.dashboadr')

@section('content')

<table class="table">
	<thead>
		<tr class="text-center">
			<th scope="col">#</th>
			<th style="width: 10%!important" scope="col">Título</th>
			<th scope="col">Estado</th>
			<th colspan="2" scope="col">Opciones</th>

		</tr>
	</thead>
	<tbody>
		@foreach ($noticias as $e)

		<tr>
			<th scope="row">{{ $e->id }}</th>
			<td style="width: 10%!important">{{ $e->titulo}}</td>
			@if ($e->state)
			<td> <i class="fas fa-check-square text-success"></i></td>

			@else
			<td> <i class="fas fa-times text-danger"></i></td>
			@endif
			<td>
				<a href="{{ route('noticia.eliminar',$e->id) }}" class="text-decoration-none btn btn-warning font-weight-bold" title="Eliminar noticia">
					Editar
				</a>
			</td>
			<td>
				<form action="{{ route('noticia.eliminar',$e->id) }}" method="POST">
					@csrf
				@method('DELETE')
				{!! Form::submit('Eliminar', ['class'=>'btn btn-danger font-weight-bold']) !!}
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>



@endsection
