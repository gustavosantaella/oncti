

<fieldset class="form-group">
	{!! Form::label('nombreName', 'Nombre', ['class'=>'font-weight-bold']) !!}
	{!! Form::text('name', $role->name, ['placeholder'=>'Nombre del rol...','class'=>'form-control','required'=>'required']) !!}

</fieldset>
<fieldset class="form-group">
	<hr>
	<h3>Permisos</h3>
	@foreach ($permission_check as $key=>$permiso)

	<ul>
		<li>
			{!! Form::label('permisos', $key, ['class'=>'font-weight-bold']) !!}
			{!! Form::checkbox('permission[]', $permiso['id'], $permiso['check'],['class'=>'font-weight-bold']) !!}
		</li>
	</ul>

	@endforeach

</fieldset>
{!! Form::submit('Guardar', ["class"=>"btn btn-primary font-weight-bold"]) !!}
