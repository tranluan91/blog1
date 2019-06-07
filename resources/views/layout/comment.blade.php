<div class="comment-form">
    <h4>Leave a Reply</h4>
    {!! Form::open(['url' => "/postComment/$post->id", 'method' => 'post']) !!}
        @if (!Auth::check())
            {!! Form::label('name', 'Name:') !!} <br/>
            {!! Form::text('name', null, ['class' => 'form-group col-lg-6 col-md-6 name']) !!}<br/>
            {!! Form::label('email', 'Email:') !!} <br/>
            {!! Form::text('email', null, ['class' => 'form-group col-lg-6 col-md-6 name']) !!}<br/>
        @endif
            {!! Form::label('content', 'Content:') !!} <br/>
            {!! Form::textarea('content', null, ['class' => 'form-control mb-10', 'id' => 'contentCommit']) !!}<br/>
            {{ Form::hidden('parentId', 0, array('id' => 'valueReply')) }}
            {!! Form::submit('Thêm mới', ['class' => 'btn btn-primary ']) !!}
    {!! Form::close() !!}
</div>
