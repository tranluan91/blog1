@extends('admin.master')
@section('content')
<div class = "main-content">
    <div class = "container-fluid">
        <h3 class = "page-title">Thêm mới user</h3>
        <div class = "row">
            <div class = "col-md-9">
                <div class = "panel">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                    </div>
                    @endif
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Inputs</h3>
                    </div>
                    <div class="panel-body">
                        <form method = "post" enctype = "multipart/form-data">
                            @csrf
                            <label>Role :</label>
                            <select class = "form-control" name = "role">
                                <option value = "1">Admin</option>
                                <option value = "0">User</option>
                            </select><br>
                            <label>Name :</label>
                            <input type = "text" class = "form-control" name = " name" placeholder = "name"><br>
                            <label>Email :</label>
                            <input type = "email" class = "form-control" name = "email" placeholder = "email"><br>
                            <label>Avatar :</label>
                            <input type="file" name = "img" ><br>
                            <label>Password :</label>
                            <input type = "password" class="form-control" name = "password" placeholder = "Password"><br>
                            <label>Comfirm Password :</label>
                            <input type = "password" class = "form-control" name = "password_confirmation" placeholder = "password_confirmation"><br>
                            <button type = "submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
