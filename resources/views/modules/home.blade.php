@extends('master')
@section ('content')
<div class="main-body section-gap">
        <div class="container box_1170">
        @include('admin.layout.status')
            <div class="row">
                <div class="col-lg-8 post-list">
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
                                    </div></span></a>
                                        </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $posts->links() }}
                        </div>
                </div>
               @include('layout.sidebar')
            </div>
        </div>
    </div>

@stop


