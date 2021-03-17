@extends('layouts.dashboadr')

@section('content')
@include('partials.messages')
{!! Form::open(['route'=>['actualizar.user',$user->id],'autocomplete'=>'off','method'=>'put']) !!}
@include('partials.user.form')
{!! Form::close() !!}
@endsection