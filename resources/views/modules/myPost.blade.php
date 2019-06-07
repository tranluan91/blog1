@extends('master')
@section ('content')
<div class="main-body section-gap">
    <div class="container box_1170">
        <div class="row">
            <div class="col-lg-8 post-list">
                <!-- Start Post Area -->
                <section class="post-area">
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-post-item">
                                <div class="post-thumb">
                                    <img class="img-fluid " src="{{ URL::asset($post->img) }}" alt="">
                                </div>
                                <div class="post-details">
                                    <h4><a href="{{ route('blogDetail', $post->id) }}">{{ $post->name }}</a></h4>
                                    {!! StringHelper::truncate($post->content, 30) !!}
                                    <div class="blog-meta">
                                        <a href="#" class="m-gap"><span class="lnr lnr-calendar-full">{{ $post->created_at->format('M d Y') }}</span></a>
                                        <a href="#" class="m-gap"><span class="lnr lnr-bubble"></span>{{ StringHelper::formatNumber($post->comments()->get()->count()) }}
                                        </span></a>
                                        <button type="button" class="btn btn-primary"><a href="{{ route('editPost', $post->id) }}" style="color: #ffffff!important">Edit Post</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12 ">
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <span aria-hidden="true">
                                                <span class="lnr lnr-arrow-left"></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a href="#" class="page-link"> {{ $posts->links() }}</a></li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <span aria-hidden="true">
                                                <span class="lnr lnr-arrow-right"></span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

