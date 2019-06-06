@extends('admin.master')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">List Users</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Post: {{ $post->name }}</h3>
                    </div>
                    @include('admin.layout.status')
                    <button type="button" class="btn btn-primary"><a href="{{ route('add-comment', $post->id ) }}" style="color: #ffffff!important">Add Comment</a></button>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Create_at   </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>
                                        {{ $comment->user()->first()->name }}
                                    </td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ ($comment->status) ? "Hiển thị" : "Ẩn" }}</td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>
                                        @if ($comment->status==false)
                                            {!! Form::open(['method' => 'post', 'url' => "/backend/edit-comment/$comment->id"]) !!}
                                                {!! Form::submit('SHOW', ['class' => 'btn btn-info']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'delete', 'url' => "/backend/delete-comment/$comment->id"]) !!}
                                            {!! Form::submit('DELETE', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
