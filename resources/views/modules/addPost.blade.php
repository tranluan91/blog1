@extends('master')
@section('content')
<section class="blog_area section-gap single-post-area">
        <div class="container box_1170">
            <div class="row">
                <div class="col-lg-9">
                <div class = "panel">
                    @include('admin.layout.validate')
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Inputs</h3><br/>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['route' => 'Post', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        {!! Form::label('category', 'Category:') !!} <br/>
                        {!! Form::select('category_id', $categoryName, null, ) !!}<br/><br/>
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
        </div>
</section>
@stop
@section('javascript')
<script src="{{ URL::asset('admin/scripts/add-post.js') }}"></script>
@stop

