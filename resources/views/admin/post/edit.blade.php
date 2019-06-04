@extends('admin.master')
@section('content')

<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">Edit Category</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="panel">
                    @include('admin.layout.validate')
                    <div class="panel-heading">
                        <h3 class="panel-title">Inputs</h3>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['url' => "/backend/edit-post/$post->id", 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        {!! Form::label('category', 'Category:') !!} <br/>
                        {!! Form::select('category_id', $categories, null, ) !!}<br/><br/>
                        {!! Form::label('name', 'Tags:') !!} <br/>
                        {!! Form::text('tags', $name, ['class' => 'form-control']) !!}
                        <p>Các tag cách nhau bởi dấu ";"</p>
                        {!! Form::label('name', 'Name:') !!} <br/>
                        {!! Form::text('name', $post->name, ['class' => 'form-control']) !!}
                        {!! Form::label('content', 'Content:') !!} <br/>
                        {!! Form::text('area', null, ['class' => 'form-control ', 'id' => "areaEdit"]) !!}<br/>
                        <img src = "{{ URL::asset($post->img) }}" alt = "Avatar" style = "width: 200px">
                        {!! Form::file('img') !!}<br/>
                        {!! Form::label('status', 'Status:') !!} 
                        {!! Form::checkbox('status', 1, ($post->status) ? true : false) !!}<br/>
                        {{ Form::hidden('content', $post->content, array('id' => 'textEdit')) }}
                        {!! Form::submit('Sửa', ['class' => 'btn btn-primary', 'onclick' => "editPost()"]) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('javascript')
<script src="{{ URL::asset('admin/scripts/edit-post.js') }}"></script>
@stop

