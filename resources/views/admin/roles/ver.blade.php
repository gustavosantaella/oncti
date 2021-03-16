@extends('layouts.dashboadr')

@section('content')
<div class="card">
	<div class="card-body">

		

		<fieldset class="form-group">
			{!! Form::label('nombreName', 'Nombre', ['class'=>'font-weight-bold']) !!}
			{!! Form::text('name', $role[0]['role']->name, ['placeholder'=>'Nombre del rol...','class'=>'form-control','required'=>'required','disabled'=>true]) !!}

		</fieldset>
		<fieldset class="form-group">
			<hr>
			<h3>Permisos</h3>

			<ul>
				@foreach ($role[1]['permission'] as $permiso)	

				<li>	
					{!! Form::label('permisos', $permiso->name, ['class'=>'font-weight-bold']) !!}
					{!! Form::checkbox('permission[]', $permiso->id, true,['class'=>'font-weight-bold','disabled'=>true]) !!}
				</li>


				@endforeach

			</ul>

		</fieldset>
		
		
		
	</div>
</div>
@endsection