@extends('layouts.dashboadr')

@section('content')
@include('partials.messages')
{!! Form::open(['route'=>'guardar.user','autocomplete'=>'off']) !!}
@include('partials.user.form')
{!! Form::close() !!}
@endsection