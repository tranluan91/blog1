@extends('master')
@section('content')
<section class="blog_area section-gap single-post-area">
        <div class="container box_1170">
        @include('admin.layout.status')
            <div class="row">
                <div class="col-lg-9">
                    <div class="comment-form">
                        <h4>Login</h4>
                        @include('admin.layout.validate')
                        {!! Form::open(['url' => '/login', 'method' => 'post']) !!}
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
</section>

@stop
