{{-- @extends('layouts.dashboadr')
@section('content')

	
		@if ($errors->any())
			<div class="alert-danger">
				<ul>
					@foreach ($errors->all() as $e)
						<li>{{ $e }}</li>
					@endforeach
				</ul>
			</div>
		@endif


	{{ Form::open(['route' => 'noticia.guardar','files'=>'true']) }}

	    <fieldset class="form-group">
			{!! Form::label('formGroupExampleInput', 'Título', ['class'=>'font-weight-bold']) !!}
			{!! Form::text('titulo', null, ['placeholder'=>'Título de la noticia...','class'=>'form-control']) !!}
		</fieldset>


		<fieldset class="form-group">
			{!! Form::label('formGroupExampleInput2', 'Extracto', ['class'=>'font-weight-bold']) !!}
			{!! Form::textarea('extracto' , null, ['placeholder'=>'Extracto de la notica...']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::label('formGroupExampleInput2', 'Cuerpo', ['class'=>'font-weight-bold']) !!}
			{!! Form::textarea('cuerpo' , null, ['placeholder'=>'Cuerpo de la notica...']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::label('formGroupExampleInput2', 'Estado', ['class'=>'font-weight-bold d-flex']) !!}
		{!! Form::select('state', [true=>'Publicado',false=>'Borrador'], 0, ['class'=>'form-control']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::label('formGroupExampleInput2', 'Imagen', ['class'=>'font-weight-bold d-flex']) !!}
		{!! Form::file('foto', ['accept'=>'image/png,image/jpg,image/jpeg']) !!}
		</fieldset>

		<fieldset class="form-group">
		
		{!! Form::submit('Enviar', ['class'=>'btn btn-primary font-weight-bold']) !!}

		</fieldset>

	{{ Form::close() }}

@endsection

@section('scripts')
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
@endsection --}}