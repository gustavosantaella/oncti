@extends('layouts.dashboadr')
@section('content')
<div class="card">

	@include('partials.errors')
	<div class="card-body">
		<div class="text-right">
			<a class="btn btn-primary font-weight-bold" href="{{ route('insertar.rol') }}">Crear rol</a>
		</div>
		<hr>
		<div >
			<table id="example" class="table table-responsive table-hover" >
				<thead>
					<th class="text-center">#</th>
					<th class="text-center"width='50%'>Nombre</th>
					{{-- <th class="text-center"width='25%'>Permisos</th> --}}
					{{-- <th  class="text-center"width='25%'>Fecha de creaci&oacute;n</th>
					<th  class="text-center"width='25%'>Fecha de actualizaci&oacute;n</th> --}}
					<th  class="text-center"width='50%'>Opciones</th>
				</thead>
				<tbody>

					@foreach ($roles as $rol)
					<tr>
						<td class="text-center">{{ $rol->id }}</td>
						<td width='50%' class="text-center">{{ $rol->name }}</td>
						
						{{-- <td width='25%'>{{ $rol->created_at }}</td>
						<td width='25%'>{{ $rol->updated_at }}</td> --}}
						<td class="text-center" width='50%'>
							<a href="{{ route('eliminar.rol',$rol->id) }}" class="btn btn-danger font-weight-bold" title="">Eliminar</a>
							<a href="{{ route('editar.rol',$rol->id)}}" class="btn btn-warning font-weight-bold" title="">Editar</a>
							<a href="{{ route('ver.rol',$rol->id)}}" class="btn btn-secondary font-weight-bold" title="">Ver</a>
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