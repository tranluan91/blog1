<div class="col-lg-4 sidebar">
    <div class="single-widget protfolio-widget">
        <img class="img-fluid" src="{{ URL::asset('blog/img/blog/user2.png') }}" alt="">
        <a href="#">
            <h4>Peter Anderson</h4>
        </a>
        <p class="p-text">
            Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend
            money on boot camp whenyou can get. Boot camps have itssuppor ters andits detractors.
        </p>
        <ul class="social-links">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a href="#"><i class="fa fa-behance"></i></a></li>
        </ul>
        <img src="{{ URL::asset('blog/img/sign.png') }}" alt="">
    </div>

    <div class="single-widget popular-posts-widget">
        <div class="jq-tab-wrapper" id="horizontalTab">
            <div class="jq-tab-menu">
                <div class="jq-tab-title active" data-tab="1">Popular</div>
                <div class="jq-tab-title" data-tab="2">Latest</div>
            </div>
            <div class="jq-tab-content-wrapper">
                <div class="jq-tab-content active" data-tab="1">
                    @foreach ($postRamdom as $post)
                    <div class="single-popular-post d-flex flex-row">
                        <div class="popular-thumb">
                            <img class="img-fluid-custom" src="{{ URL::asset($post->img) }}" alt="" >
                        </div>
                        <div class="popular-details">
                            <h6><a href="{{ route('blogDetail', $post->id) }}">{{ $post->name }} <br><a></h6>
                                <p>{{ $post->created_at->format('M d Y') }}</p>
                            </div>
                        </div>
                        @endforeach 
                    </div>
                    <div class="jq-tab-content active" data-tab="2">
                        @foreach ($postLastests as $post)
                        <div class="single-popular-post d-flex flex-row">
                            <div class="popular-thumb">
                                <img class="img-fluid-custom" src="{{ URL::asset($post->img) }}" alt="" >
                            </div>
                            <div class="popular-details">
                                <h6><a href="{{ route('blogDetail', $post->id) }}">{{ $post->name }} <br><a></h6>
                                    <p>{{ $post->created_at->format('M d Y') }}</p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-widget category-widget">
                <h4 class="title">Post Categories</h4>
                <ul>
                    @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('category', $category->id) }}" class="justify-content-between align-items-center d-flex">
                            <p><img src="{{ URL::asset('blog/img/bullet.png') }}" alt="">{{ $category->name }}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="single-widget tags-widget">
                <h4 class="title">Post Tags</h4>
                <ul>
                    @foreach ($tags as $tag)
                    <li><a href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <style>
            .img-fluid-custom{
                max-width: 100px;
            }
        </style>
        