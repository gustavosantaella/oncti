@extends('layouts.dashboadr')
@section('content')
@include('partials.errors')

{{ Form::model($id,['route' => ['noticia.editar',$id],'method'=>'put']) }}

@include('partials.noticias.formNew',['btn'=>'Actualizar'])

<fieldset class="form-group">

	{!! Form::submit('Actualizar', ['class'=>'btn btn-primary font-weight-bold']) !!}

</fieldset>

{{ Form::close() }}

{{ Form::model($id,['route' => ['noticia.editarFoto',$id],'files'=>'true','method'=>'put']) }}
<fieldset class="form-group">

	<h2>Imagen actual</h2>

	<img src="{{ $noticia->url }}" width="350" height="250" alt="">
</fieldset>
<fieldset class="form-group">

	{!! Form::label(null, null, ['class'=>'font-weight-bold d-flex']) !!}
	{!! Form::file('foto', ['accept'=>'image/png,image/jpg,image/jpeg']) !!}
</fieldset>

<fieldset class="form-group">

	{!! Form::submit('Actualizar imagen', ['class'=>'btn btn-primary font-weight-bold']) !!}

</fieldset>
{{ Form::close() }}




@endsection

@include('partials.noticias.scriptTypedNew')