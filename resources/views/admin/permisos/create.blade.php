@extends('layouts.dashboadr')
@section('content')
<div class="card">

	<div class="card-body">
		<div class="text-right">
			<button class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#exampleModal">Crear permiso</button>
		</div>


		@include('partials.permisos.form',['ruta'=>'guardar.permiso'])

		<hr>
		<div >
			<table id="example" class="table table-responsive table-hover" >
				<thead>
					<th class="text-center">#</th>
					<th class="text-center"width='25%'>Nombre</th>
					<th  class="text-center"width='25%'>Fecha de creaci&oacute;n</th>
					<th  class="text-center"width='25%'>Fecha de actualizaci&oacute;n</th>
					<th  class="text-center"width='25%'>Opciones</th>
				</thead>
				<tbody>

					@foreach ($permisos as $permiso)
					<tr>
						<td>{{ $permiso->id }}</td>
						<td width='25%'>{{ $permiso->name }}</td>
						<td width='25%'>{{ $permiso->created_at }}</td>
						<td width='25%'>{{ $permiso->updated_at }}</td>
						<td class="text-center" width='25%'>
							<a href="{{ route('eliminar.permiso',$permiso->id) }}" class="btn btn-danger font-weight-bold" title="">Eliminar</a>
						{{-- 	<a href="#" class="btn btn-warning font-weight-bold" title="">Editar</a> --}}
						</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	
	td{
		padding-top: 20px;
	}
</style>
@endsection

@section('scripts')

<script src="{{ asset('js/js-template-bootstrap/charts/datatables-demo.js') }}"></script>

@endsection