@extends('master')
@section ('content')
<section class="blog_area section-gap single-post-area">
    <div class="container box_1170">
        @include('admin.layout.validate')
        @include('admin.layout.status')
        <div class="row">
        @if (Auth::check() && Auth::user()->id == $post->user_id && $commentsHide->first())
        <div class="col-lg-8">
             <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Content</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commentsHide as $commentHide)
                        <tr>
                            <td>{{ ($commentHide->name) ? $commentHide->name : ($commentHide->user()->first())['name'] }}</td>
                            <td>{{ ($commentHide->content) }}</td>
                            <td>
                                {!! Form::open(['method' => 'post', 'url' => "show-comment/$commentHide->id"]) !!}
                                {!! Form::submit('SHOW', ['class' => 'btn btn-info']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {!! Form::open(['method' => 'delete', 'url' => "/delete-comment/$commentHide->id"]) !!}
                                {!! Form::submit('DELETE', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        <div class="col-lg-8">
            <div class="main_blog_details">
                <img class="img-fluid" src="{{ URL::asset($post->img) }}" alt="">
                <h4>{{ $post->name }}</h4>
                <div class="user_details">
                    <div class="float-left">
                        @foreach ($tagsPosts as $tagsPost)
                        <a href="{{ route('tag', $tagsPost->id) }}">{{ $tagsPost->name }}</a>
                        @endforeach
                    </div>
                    <div class="float-right">
                        <div class="media">
                            <div class="media-body">
                                <h5>{{ $user->name }}</h5>
                                <p>{{ $post->created_at->format('M d Y') }}</p>
                            </div>
                            <div class="d-flex" style="width=50px;">
                                <img src="{{ URL::asset($user->img) }}" alt="" class="img-user">
                            </div>
                        </div>
                    </div>
                </div>
                {!! $post->content !!}
                <div class="news_d_footer">
                    <a class="justify-content-center ml-auto" href="#"><i class="lnr lnr lnr-bubble">
                    </i>{{ StringHelper::formatNumber($countComment) }}Comments</a>
                </div>
                <div class="comments-area">
                    <h4>{{ StringHelper::formatNumber($countComment) }} Comments</h4>
                    @foreach ($comments as $comment) 
                        @if ($comment->parent_id == 0)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ URL::asset( ($comment->user_id) ? $comment->user->img : 'uploads/guest.png') }}" alt="" class="img-user">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="">{{ ($comment->user_id) ? $comment->user->name : $comment->name }}</a></h5>
                                            <p class="date">{{ $comment->created_at->format('M d Y') }}</p>
                                            <p class="comment">{{$comment->content}}</p>
                                        </div>
                                    </div>
                                    <div class="reply-btn">
                                        <input type="button" class="btn-reply text-uppercase" value="reply" id="reply" onclick="reply({{ ($comment->id)}})">
                                    </div>
                                </div>
                            </div>
                            @foreach ($comments as $commentChild)
                                @if ($comment->id == $commentChild->parent_id)
                                <div class="comment-list left-padding">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                            <img src="{{ URL::asset( ($commentChild->user_id) ? $commentChild->user->img : 'uploads/guest.png') }}" alt="" class="img-user">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">{{ $commentChild->user->name }}</a></h5>
                                                <p class="date">{{ $commentChild->created_at->format('M d Y') }}</p>
                                                <p class="comment">{{$commentChild->content}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <!-- comment -->
                    @include('layout.comment')
                </div>
            </div>
        </div>
        @include('layout.sidebar')
    </div>
</section>
<style>
    .img-user{
        max-width:100px;
        height:100px;
    }
</style>
@stop
