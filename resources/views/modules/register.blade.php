@extends('master')
@section('content')
<section class="blog_area section-gap single-post-area">
        <div class="container box_1170">
            <div class="row">
                <div class="col-lg-9">
                    <div class="comment-form">
                        <h4 text-align="center">Register</h4>
                        @include('admin.layout.validate')
                        {!! Form::open(['url' => '/register', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                            {!! Form::label('name', 'Name :') !!} <br/>
                            {!! Form::input('name', 'name', null, ['class' => 'form-control']) !!}
                            {!! Form::label('email', 'Email :') !!} <br/>
                            {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}<br/>
                            {!! Form::label('avatar', 'Avatar :') !!} <br/>
                            {!! Form::file('img') !!}<br/><br/>
                            {!! Form::label('password', 'Password :') !!} <br/>
                            {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}<br/>
                            {!! Form::label('password_confirm', 'Password Confirm :') !!} 
                            {!! Form::input('password', 'password_confirm', null, ['class' => 'form-control']) !!}<br/>
                            {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</section>

@stop
