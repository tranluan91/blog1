@extends('admin.master')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">List Users</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Basic Table</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($user))
                                @foreach ($user as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td><img src="{{ URL::asset($value->img) }}" alt="" style="width: 200px"></td>
                                    <td>{{ ($value->role) ? "Admin" : "User" }}</td>
                                    <td>{{ ($value->action) ? "Off" : "On" }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary"><a href="{{ route('edit-user',$value->id) }}" style="color: #ffffff!important">Edit</a></button>
                                    </td>
                                    <td>
                                        <form action="{{ url('/backend/users', $value->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete" />
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('abc');" >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop