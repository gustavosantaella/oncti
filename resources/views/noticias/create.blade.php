@extends('layouts.dashboadr')
@section('content')
@include('partials.errors')

{{ Form::open(['route' => 'noticia.guardar','files'=>'true']) }}

@include('partials.noticias.formNew',['btn'=>'Enviar'])
<fieldset class="form-group">

	{!! Form::label(null, 'Imagen', ['class'=>'font-weight-bold d-flex']) !!}
	{!! Form::file('foto', ['accept'=>'image/png,image/jpg,image/jpeg']) !!}
</fieldset>
<fieldset class="form-group">

	{!! Form::submit('Enviar', ['class'=>'btn btn-primary font-weight-bold']) !!}

</fieldset>

</fieldset>
{{ Form::close() }}

@endsection

@include('partials.noticias.scriptTypedNew')