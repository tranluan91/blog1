@extends('admin.master')
@section('content')

<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">Edit Tag</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="panel">
                    @include('admin.layout.validate')
                    <div class="panel-heading">
                        <h3 class="panel-title">Inputs</h3>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'url' => "/backend/edit-tag/$tag->id"]) !!}
                        {!! Form::label('name', 'Name:') !!} <br/>
                        {!! Form::text('name', $tag->name, ['class' => 'form-control']) !!}
                        {!! Form::label('name', 'Status:') !!}
                        {!! Form::checkbox('status', 1, ($tag->status) ? true : false) !!}<br/>
                        {!! Form::submit('Sửa', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
