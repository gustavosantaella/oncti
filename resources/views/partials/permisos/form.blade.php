


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Crear permiso</h5>
				<button type="button" style="outline: none;border: 0;" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route'=>$ruta]) !!}
				<fieldset class="form-group">
					{!! Form::label('nombreName', 'Nombre', ['class'=>'font-weight-bold']) !!}
					{!! Form::text('name', $permiso->name, ['placeholder'=>'Nombre del permiso...','class'=>'form-control','required'=>'required']) !!}

				</fieldset>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal" style="outline: none;border: 0;">Cerrar</button>
				{!! Form::submit('Guardar', ["class"=>"btn btn-primary font-weight-bold"]) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>