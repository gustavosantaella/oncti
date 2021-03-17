

<fieldset class="form-group">
	{!! Form::label('name', 'Nombre', ['class'=>' font-weight-bold']) !!}
	{!! Form::text('name', $user->name, ['placeholder'=>'Nombre...','class'=>'form-control']) !!}
</fieldset>
<fieldset class="form-group">
	{!! Form::label('lastname', 'Apellido', ['class'=>' font-weight-bold']) !!}
	{!! Form::text('lastname', $user->lastname, ['class'=>'form-control','placeholder'=>'Apellido...']) !!}
</fieldset>

<fieldset class="form-group">
	{!! Form::label('username', 'Usuario', ['class'=>' font-weight-bold']) !!}	{!! Form::text('username', $user->username, ['class'=>'form-control','placeholder'=>'Usuario...']) !!}
</fieldset>
<hr>
<fieldset class="form-group">
	<h3>Rol</h3>
	<ul>
		@foreach ($roleUser as $key =>$role)
		<li>
			{!! Form::label("rol-$role[id]",$key, []) !!}
	
				{!! Form::checkbox('role[]', $role['id'], $role['check'], ['id'=>"rol-$role[id]",]) !!}
	
		</li>
		@endforeach
	</ul>
</fieldset>
<hr>

<fieldset class="form-group">
	{!! Form::label('Activo', 'Activo', ['class'=>'font-weight-bold']) !!}
	{!! Form::checkbox('state', $user->state,$user->state , ['id'=>'Activo']) !!}
</fieldset>
<hr>
<fieldset class="form-group">
	{!! Form::label('password', 'Clave', ['class'=>' font-weight-bold']) !!}
	{!! Form::input('password', 'password',$user->password,['class'=>'form-control','placeholder'=>'Clave...']) !!}
</fieldset>

<fieldset class="form-group">
	{!! Form::submit('Guardar', ['class'=>'btn btn-primary font-weight-bold']) !!}
</fieldset>


