@extends('layouts.dashboadr')

@section('content')

<table class="table" id="example">
	<thead>
		<tr class="text-center">
			<th scope="col">#</th>
			<th style="width: 30%!important" scope="col">Título</th>
			<th scope="col">Fecha</th>
			<th scope="col">Estado</th>
			<th colspan="0" scope="col"></th>
			<th ></th>
			<th ></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($noticias as $e)

		<tr>
			<th  class="text-center" scope="row">{{ $e->id }}</th>
			<td style="width: 30%!important">{{ $e->titulo}}</td>
			<td class="text-center">{{ date('d/m/Y H:i:s', strtotime($e->fecha)) }}</td>
			@if ($e->state)
			<td class="text-center"> <i class="fas fa-check-square text-success"></i></td>

			@else
			<td class="text-center"> <i class="fas fa-times text-danger"></i></td>
			@endif

			<td class="text-center">
				<a href="{{ route('ver.edit',$e->id) }}" class="text-decoration-none btn btn-warning font-weight-bold" title="Eliminar noticia">
					Editar
				</a>
			</td>

			<td class="text-center">
				<a href="{{ route('ver.noticia',$e->id) }}" class="text-decoration-none btn btn-light font-weight-bold" title="Ver noticia">
					Vista previa
				</a>
			</td>

			<td class="text-center">
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

@section('scripts')

<script src="{{ asset('js/js-template-bootstrap/charts/datatables-demo.js') }}"></script>

@endsection