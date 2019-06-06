@extends('admin.master')
@section('content')

<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">Edit user</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="panel">
                    @include('admin.layout.validate')
                    <div class="panel-heading">
                        <h3 class="panel-title">Inputs</h3>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['url' => "/backend/edit-profile/$user->id", 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        {!! Form::label('name', 'Name:') !!} <br/>
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                        {!! Form::label('email', 'Email:') !!} <br/>
                        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        <img src = "{{ URL::asset($user->img) }}" alt = "Avatar" style = "width: 200px">
                        {!! Form::file('img') !!}<br/>
                        {!! Form::label('password', 'Old_Password:') !!} <br/>
                        {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}<br/>
                        {!! Form::label('password', 'New_Password:') !!} <br/>
                        {!! Form::input('password', 'password_new', null, ['class' => 'form-control']) !!}<br/>
                        {!! Form::label('password', 'Password_Confirmation:') !!} <br/>
                        {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}<br/>
                        {!! Form::submit('Sửa', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
