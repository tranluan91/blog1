@extends('admin.master')
@section('content')

<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">Edit user</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="panel">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                      {!! implode('', $errors->all('<div>:message</div>')) !!}
                    </div>
                    @endif
                    <div class="panel-heading">
                        <h3 class="panel-title">Inputs</h3>
                    </div>
                    <div class="panel-body">
                        <form method = "post" enctype = "multipart/form-data">
                            @csrf
                            <label>Role :</label>
                            <select name = "role" class = "form-control">
                                <option value = "0">User</option>
                                <option value = "1">Admin</option>
                            </select><br>
                            <label >Action :</label>
                            <select class="form-control" name="action">
                                <option value = "0">On</option>
                                <option value = "1">OFF</option>
                            </select><br>
                            <label>Name :</label>
                            <input type = "text" class = "form-control" name = "name" placeholder = "name" value="{{ $user->name }}"><br>
                            <label>Email :</label>
                            <input type="email" class = "form-control" name = "email" placeholder = "email" value="{{ $user->email }}"><br>
                            <label>Avatar :</label>
                            <img src = "{{URL::asset($user->img)}}" alt = "Avatar" style = "width: 200px">
                            <input type = "file" name = "img" ><br>
                            <button type = "submit" class = "btn btn-primary">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
