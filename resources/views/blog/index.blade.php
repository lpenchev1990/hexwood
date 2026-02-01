@include('layouts.header')
@include('components.hader')


<!--====== BREADCRUMB PART START ======-->
<section class="breadcrumb-area" style="background-image: url({{asset('assets/img/images/aboutus.jpg')}}); margin-top: 165px">
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
            <div class="col-lg-8 col-md-10">
                <div class="blog-loop">
                    @foreach($posts as $post)
                    @endforeach
                    <div class="post-box mb-40">
                        <div class="post-media">
                            <img src="{{asset('uploads/'.$post->image)}}" alt="Image">
                        </div>
                        <div class="post-desc">
                            <h2>
                                <a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a>
                            </h2>
                            <ul class="post-meta">
                                <li><a href="{{route('blog.detail',$post->slug)}}"><i class="far fa-calendar-alt"></i>{{$post->updated_at}}</a>
                                </li>
                            </ul>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 310) }}
                            </p>
                            <div class="post-footer">
                                <div class="author">
                                </div>
                                <div class="read-more"> <a href="{{route('blog.detail',$post->slug)}}"><i class="far fa-arrow-right"></i>Прочети още...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="pagination-wrap">--}}
{{--                    <ul>--}}
{{--                        <li><a href="#"><i class="far fa-angle-double-left"></i></a>--}}
{{--                        </li>--}}
{{--                        <li class="active"><a href="#">1</a>--}}
{{--                        </li>--}}
{{--                        <li><a href="#">2</a>--}}
{{--                        </li>--}}
{{--                        <li><a href="#">3</a>--}}
{{--                        </li>--}}
{{--                        <li><a href="#">...</a>--}}
{{--                        </li>--}}
{{--                        <li><a href="#">10</a>--}}
{{--                        </li>--}}
{{--                        <li><a href="#"><i class="far fa-angle-double-right"></i></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</section>


@include("layouts.footer")
