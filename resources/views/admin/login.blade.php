@extends('admin.master')
@section('content')
<div class = "main-content">
    <div class = "container-fluid">
        <h3 class = "page-title">Login</h3>
        <div class = "row">
            <div class = "col-md-9">
                <div class = "panel">
                @if (session('erorr'))
                    <div class="alert alert-danger">{{ session('erorr') }}</div>
                @endif
                    @include('admin.layout.validate')
                    @include('admin.layout.status')
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Inputs</h3>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['url' => '/backend/login', 'method' => 'post']) !!}
                        {!! Form::label('email', 'Email :') !!} <br/>
                        {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
                        {!! Form::label('password', 'Password :') !!} <br/>
                        {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}<br/>
                        {!! Form::label('remember', 'Remember me :') !!} 
                        {!! Form::checkbox('status', 1) !!}<br/>
                        {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

