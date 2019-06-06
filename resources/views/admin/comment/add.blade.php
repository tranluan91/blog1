@extends('admin.master')
@section('content')
<div class = "main-content">
    <div class = "container-fluid">
        <h3 class = "page-title">Thêm mới Comment</h3>
        <div class = "row">
            <div class = "col-md-9">
                <div class = "panel">
                    @include('admin.layout.validate')
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Post :{{ $post->name }}</h3>
                        <h4 class = "panel-title">User :{{ $user->name }}</h4>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['url' => "/backend/add-comment/$post->id", 'method' => 'post']) !!}
                        {!! Form::label('content', 'Content:') !!} <br/>
                        {!! Form::text('content', null, ['class' => 'form-control']) !!}<br/>
                        {!! Form::submit('Thêm mới', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


