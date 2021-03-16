@extends('layouts.dashboadr')
@section('content')
@include('partials.errors')
{!! Form::open(['route'=>'guardar.rol','method'=>'POST']) !!}
@include('partials.roles.form',['value_temporal_permisos_checkbox'=>null])
{!! Form::close() !!}
@endsection