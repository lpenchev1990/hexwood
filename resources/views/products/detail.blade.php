@include('layouts.header')
@include('components.hader')

<!--====== BREADCRUMB PART START ======-->
<section class="breadcrumb-area"
         style="background-image: url({{ asset($product['images'][0] ?? 'assets/img/bg/default.jpg') }}); margin-top: 165px">
    <div class="container">
        <div class="breadcrumb-text">
            <h2 class="page-title">{{ $product['title'] }}</h2>
            <ul class="breadcrumb-nav">
                <li><a href="{{ route('home') }}">Начало</a></li>
                <li class="active">{{ $product['title'] }}</li>
            </ul>
        </div>
    </div>
</section>

<section class="Shop-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">

            {{-- LEFT: IMAGES --}}
            <div class="col-lg-5">
                <div class="shop-detail-image">

                    {{-- MAIN SLIDER --}}
                    <div class="detail-slider-1">
                        @foreach($product['images'] as $img)
                            <div class="slide-item">
                                <div class="image-box">
                                    <a href="#">
                                        <img src="{{ asset('uploads/'.$img) }}" class="img-fluid" alt="{{ $product['title'] }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- THUMB SLIDER --}}
                    <div class="detail-slider-2">
                        @foreach($product['images'] as $img)
                            <div class="slide-item">
                                <div class="image-box">
                                    <img src="{{ asset('uploads/'.$img) }}" class="img-fluid" alt="{{ $product['title'] }}">
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            {{-- RIGHT: PRODUCT INFO --}}
            <div class="col-lg-7">
                <div class="shop-detail-content">

                    {{-- TITLE --}}
                    <h3 class="product-title mb-20">
                        {{ $product['title'] }}
                    </h3>

                    {{-- PRICE --}}
                    <div class="desc mb-20 pb-20 border-bottom">
                        @if(!empty($product['price']))
                            <span class="price">
                                {{ number_format($product['price'], 2) }} €.
                            </span>
                        @else
                            <span class="price">Цена при запитване</span>
                        @endif
                    </div>

                    {{-- SKU --}}
                    <div class="mt-20 mb-20">
                        <div class="d-inline-block other-info">
                            <h6>Наличност:
                                <span class="text-success ml-2">Изработка при поръчка (срок 5 дни )</span>
                            </h6>
                        </div>
                        <div class="ml-2 d-inline-block other-info">
                            <h6>SKU:
                                <span class="grey ml-2">
                                    {{ $product['sku'] }}
                                </span>
                            </h6>
                        </div>
                    </div>

                    {{-- SHORT DESCRIPTION --}}
                    <div class="short-descr mb-20">
                        {!! nl2br(e(\Illuminate\Support\Str::limit($product['description'], 200))) !!}
                        <a href="#description" class="read-more">Виж повече</a>
                    </div>
                    <div class="color-sec mb-20">
                        <label>Material</label>
                        <div class="color-box">
                            <label class="m-0">
                                <input type="radio" name="material">
                                <span class="choose-material">Gold</span>
                            </label>
                            <label class="m-0">
                                <input type="radio" name="material">
                                <span class="choose-material">Diamond</span>
                            </label>
                            <label class="m-0">
                                <input type="radio" name="material">
                                <span class="choose-material">Silver</span>
                            </label>
                            <label class="m-0">
                                <input type="radio" name="material">
                                <span class="choose-material">Stone</span>
                            </label>
                        </div>
                    </div>
                    {{-- CATEGORY --}}
                    <div class="other-info flex mt-20">
                        <h6>Category:</h6>
                        <ul>
                            <li class="list-inline-item mr-2">
                                <span class="grey">
                                    {{ ucfirst($product['category']) }}
                                </span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            {{-- DESCRIPTION TAB --}}
            <div class="col-12">
                <div class="product-description mt-100">
                    <div class="tabs">
                        <ul class="nav nav-tabs justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#description">
                                    Description
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content pb-0">
                            <div class="tab-pane active" id="description">
                                {!! nl2br(e($product['description'])) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@include('layouts.footer')
