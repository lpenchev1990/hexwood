<div class="col-lg-12 col-md-12">
    <div class="shop-products-wrapper">
        {{--        <div class="shop-product-top">--}}
        {{--            <p>Showing 1 To 9 Of 60 results</p>--}}
        {{--            <div class="sorting-box">--}}
        {{--                <select name="guests" id="guests">--}}
        {{--                    <option value="" disabled selected>Default Sorting</option>--}}
        {{--                    <option value="1">Sort By Popularity</option>--}}
        {{--                    <option value="2">Sort By Latest</option>--}}
        {{--                    <option value="4">Sort By Rating</option>--}}
        {{--                    <option value="8">Sort By Price:Low to High</option>--}}
        {{--                    <option value="8">Sort By Price:High to Low</option>--}}
        {{--                </select>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="product-wrapper restaurant-tab-area">
            <div class="row">
                @foreach($products as $product)

                    <div class="col-lg-4 col-md-12">
                        <div class="food-box shop-box">
                            <div class="thumb">
                                <a href="{{route('product.detail', $product['id'])}}">
                                    <img src="{{asset('uploads/'.$product['image'])}}" alt="images">
                                </a>

                            </div>
                            <div class="desc">
                                <h4>
                                    <a href="{{route('product.detail', $product['id'])}}">{{$product['title']}}</a>
                                </h4>
                                @if($product['price'] == NULL)
                                    <span class="price">Попитай за цена</span>
                                @else
                                    <span class="price">{{$product['price']}} €</span>

                                @endif
                                <a href="{{route('product.detail', $product['id'])}}" class="link"><i
                                        class="fal fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
    <div class="pagination-wrap">
        <ul>
            <li><a href="#"><i class="far fa-angle-double-left"></i></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">10</a></li>
            <li><a href="#"><i class="far fa-angle-double-right"></i></a></li>
        </ul>
    </div>
</div>
