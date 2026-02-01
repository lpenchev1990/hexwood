@include('layouts.header')
@include('components.hader')


<!--====== BREADCRUMB PART START ======-->
<section class="breadcrumb-area" style="background-image: url({{asset('uploads/'.$post->image)}}); margin-top: 165px">
    <div class="container">
        <div class="breadcrumb-text">
            <h2 class="page-title">Блог</h2>
            <ul class="breadcrumb-nav">
                <li><a href="{{ route('home') }}">Начало</a></li>
                <li class="active">Блог</li>
            </ul>
        </div>
    </div>
</section>

<section class="blog-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center column-reverse">
            <div class="col-lg-8">
                <div class="news-details-box">
                    <div class="entry-content">
                        <h2 class="title">{{$post->title}} </h2>
                        <ul class="post-meta">
                            <li><a href="#"><i class="fal fa-comments"></i>{{$post->updated_at}}</a></li>
                        </ul>
                        <div>
                            {!! $post->content !!}
                        </div>
                    </div>
                    <div class="entry-footer">
                        <div class="tag-and-share mt-50 mb-50 d-md-flex align-items-center justify-content-between">
                            <div class="tag">
                                <h5>Related Tags</h5>
                                <ul>
                                    @php
                                        $tags = array_filter(array_map('trim', explode(',', $post->tags)));
                                    @endphp
                                    <div class="col-md-12">
                                    @foreach($tags as $tag)
                                        <li>
                                            <a href="#">
{{--                                                <a href="{{ route('blog.tag', Str::slug($tag)) }}">--}}
                                                {{ $tag }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="share col-md-12">
                            <h5>Social Share</h5>
                            <ul style="display: inline-flex;gap: 31px;">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-medium"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-tumblr"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include("layouts.footer")
