@extends('admin.master')
@section('content')
<div class = "main-content">
    <div class = "container-fluid">
        <h3 class = "page-title">Thêm mới Category</h3>
        <div class = "row">
            <div class = "col-md-9">
                <div class = "panel">
                    @include('admin.layout.validate')
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Inputs</h3>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['url' => '/backend/add-category', 'method' => 'post']) !!}
                        {!! Form::label('name', 'Name:') !!} <br/>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('name', 'Status:') !!}
                        {!! Form::checkbox('status', 1) !!}<br/>
                        {!! Form::submit('Thêm mới', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

