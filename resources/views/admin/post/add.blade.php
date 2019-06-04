@extends('admin.master')
@section('content')

<div class = "main-content">
    <div class = "container-fluid">
        <h3 class = "page-title">Thêm mới Bài viết </h3>
        <div class = "row">
            <div class = "col-md-9">
                <div class = "panel">
                    @include('admin.layout.validate')
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Inputs</h3>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['url' => '/backend/add-post', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        {!! Form::label('category', 'Category:') !!} <br/>
                        {!! Form::select('category_id', $categories, null, ) !!}<br/><br/>
                        {!! Form::label('name', 'Tags:') !!} <br/>
                        {!! Form::text('tags', null, ['class' => 'form-control']) !!}
                        <p>Các tag cách nhau bởi dấu ";"</p>
                        {!! Form::label('name', 'Name:') !!} <br/>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('content', 'Content:') !!} <br/>
                        {!! Form::text('area', null, ['class' => 'form-control ', 'id' => "area"]) !!}<br/>
                        {!! Form::file('img') !!}<br/>
                        {!! Form::label('status', 'Status:') !!}
                        {!! Form::checkbox('status', 1) !!}<br/>
                        {{ Form::hidden('content', 'secret', array('id' => 'text')) }}
                        {!! Form::submit('Thêm mới', ['class' => 'btn btn-primary', 'onclick' => "submition()"]) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('javascript')
<script src="{{ URL::asset('admin/scripts/add-post.js') }}"></script>
@stop


