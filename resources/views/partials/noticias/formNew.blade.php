<fieldset class="form-group">
	{!! Form::label('formGroupExampleInput', 'Título', ['class'=>'font-weight-bold']) !!}
	{!! Form::text('titulo', $noticia->titulo, ['placeholder'=>'Título de la noticia...','class'=>'form-control']) !!}
</fieldset>


<fieldset class="form-group">
	{!! Form::label('formGroupExampleInput2', 'Extracto', ['class'=>'font-weight-bold']) !!}
	{!! Form::textarea('extracto' , $noticia->extracto, ['placeholder'=>'Extracto de la notica...']) !!}
</fieldset>

<fieldset class="form-group">
	{!! Form::label('formGroupExampleInput2', 'Cuerpo', ['class'=>'font-weight-bold']) !!}
	{!! Form::textarea('cuerpo' , $noticia->cuerpo, ['placeholder'=>'Cuerpo de la notica...']) !!}
</fieldset>

<fieldset class="form-group">
	{!! Form::label('formGroupExampleInput2', 'Estado', ['class'=>'font-weight-bold d-flex']) !!}
	{!! Form::select('state', [true=>'Publicado',false=>'Borrador'], 0, ['class'=>'form-control']) !!}
</fieldset>




