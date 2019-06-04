@extends('admin.master')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">List Users</h3>
        <div class="row">
            <div class="col-md-12" >
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Basic Table</h3>
                    </div>
                    @include('admin.layout.status')
                    <div class="panel-body">
                        @foreach ($posts as $post)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User_Post</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Name</th>
                                    <th>Content</th>
                                    <th>Images</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>
                                        @foreach ($post->user()->pluck('name') as $name)
                                            {{ $name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($post->category()->pluck('name') as $name)
                                            {{ $name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($post->tags as $tag)
                                            {{ $tag->name }} <br/>
                                        @endforeach
                                    </td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td><img src="{{ URL::asset($post->img) }}" alt="" style="width: 150px"></td>
                                    <td>{{ $post->status ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td>
                                    <button type="button" class="btn btn-primary"><a href="{{ route('edit-post', $post->id) }}" style="color: #ffffff!important">Edit</a></button>
                            
                                        {!! Form::open(['method' => 'delete', 'url' => "/backend/delete-post/$post->id"]) !!}
                                            {!! Form::submit('DELETE', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
