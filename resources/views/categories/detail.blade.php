@include('layouts.header')
@include('components.hader')


<!--====== BREADCRUMB PART START ======-->
<section class="breadcrumb-area" style="background-image: url({{asset($category['image'])}}); margin-top: 165px">
    <div class="container">
        <div class="breadcrumb-text">
            <h2 class="page-title">{{$category['name']}}</h2>
            <ul class="breadcrumb-nav">
                <li><a href="{{ route('home') }}">Начало</a></li>
                <li class="active">{{$category['name']}}</li>
            </ul>
        </div>
    </div>
</section>
<!--====== BREADCRUMB PART END ======-->
<!--====== SHOP SECTION START ======-->
<section class="Shop-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Shop Sidebar -->
            @if($showArticles == 1)
                @include('categories.list-items')
            @else
                @include("categories.your-idea")
            @endif
        </div>
    </div>
</section>

@include("layouts.footer")
