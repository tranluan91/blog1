@extends('master')
@section('content')

<section class="blog_area section-gap single-post-area">
    <div class="container box_1170">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align:center;margin-bottom:50px;">Profile</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><img src="{{ URL::asset($user->img) }}" alt="" style="width: 200px"></td>
                                    <td>
                                        <button type="button" class="btn btn-primary"><a href="{{ route('userEditProfile', $user->id) }}" style="color: #ffffff!important">Update profile</a></button>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


