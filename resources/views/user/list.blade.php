@extends('layouts.dashboadr')
@section('content')

<div class="card">

	<div class="card-body">
		<div class="text-right">
			<a class="btn btn-primary font-weight-bold" href="{{ route('crear.user') }}">Crear usuario</a>
		</div>
		<hr>
		<div >
			<table id="example" class="table table-responsive table-hover" >
				<thead>
					<th class="text-center">#</th>
					<th class="text-center"width='25%'>Nombre</th>
					<th class="text-center"width='25%'>Usuario</th>
					<th class="text-center"width='25%'>Estado</th>
					<th  class="text-center"width='25%'>Opciones</th>
				</thead>
				<tbody>

					@foreach ($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td width='25%'>{{ $user->name }} {{ $user->lastname }}</td>
						<td width='25%'>{{ $user->username }}</td>
						@if ($user->state)
						<td width="25%" class="text-center"><i class="fas fa-check text-success"></i></td>
						@else

						<td width="25%" class="text-center"><i class="fas fa-times text-danger"></i></td>

						@endif
						<td class="text-center" width='25%'>
							<a href="{{ route('eliminar.user',$user->id) }}" class="btn btn-danger font-weight-bold" title="">Eliminar</a>
							<a href="{{ route('editar.user',$user->id) }}" class="btn btn-warning font-weight-bold" title="">Editar</a>
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
