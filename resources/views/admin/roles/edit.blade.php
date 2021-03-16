@extends('layouts.dashboadr')

@section('content')
@include('partials.errors')
<div class="card">
	<div class="card-body">
		{!! Form::model($role,['route'=>['editar.rol',$role->id],'method'=>'PUT']) !!}
		@include('partials.roles.form',['value_temporal_permisos_checkbox'=>null])
		{!! Form::close() !!}
	</div>
</div>
@endsection