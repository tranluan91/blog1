@extends('master')
@section('content')
<section class="blog_area section-gap single-post-area">
        <div class="container box_1170">
            <div class="row">
                <div class="col-lg-9">
                    <div class="comment-form">
                    <h3 class="panel-title" style="text-align:center;margin-bottom:50px;">Edit Profile</h3>
                        @include('admin.layout.validate')
                        {!! Form::open(['url' => "edit-profile/$user->id", 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
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
</section>

@stop

