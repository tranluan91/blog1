@extends('admin.master')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">List Tag</h3>
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
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ ($tag->status) ? "Hiển thị" : "Ẩn" }}</td>
                                    <td>
                                    <button type="button" class="btn btn-primary"><a href="{{ route('edit-tag', $tag->id) }}" style="color: #ffffff!important">Edit</a></button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'delete', 'url' => "/backend/delete-tag/$tag->id"]) !!}
                                            {!! Form::submit('DELETE', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
