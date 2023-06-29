@extends('front.layout.master')
@section('title', $title )
@section('body')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url("/")}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="shop">
                                <input type="text" name="search" value="{{request("search")}}" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                @include('front.shop.components.products-sidebar-fitel')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <form action="">
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sorting :</p>
                                    <select name="sort_by" onchange="this.form.submit();" class="sorting">
                                        <option {{request('sort_by') == 'latest' ? 'selected' : ''}} value="latest">Latest</option>
                                        <option {{request('sort_by') == 'oldest' ? 'selected' : ''}} value="oldest">Oldest</option>
                                        <option {{request('sort_by') == 'name-ascending' ? 'selected' : ''}} value="name-ascending">Name A-Z</option>
                                        <option {{request('sort_by') == 'name-descending' ? 'selected' : ''}} value="name-descending">Name Z-A</option>
                                        <option {{request('sort_by') == 'price-ascending' ? 'selected' : ''}} value="price-ascending">Price Ascending</option>
                                        <option {{request('sort_by') == 'price-descending' ? 'selected' : ''}} value="price-descending">Price Decrease</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Show :</p>
                                    <select name="show" onchange="this.form.submit();" class="p-show">
                                        <option {{request('show') == '3' ? 'selected' : ''}} value="3">3</option>
                                        <option {{request('show') == '9' ? 'selected' : ''}} value="9">9</option>
                                        <option {{request('show') == '15' ? 'selected' : ''}} value="15">15</option>
                                    </select>

                                </div>
                            </div>

                        </div>
                        </form>

                    </div>
                    <div class="row">
                        @foreach($product as $pr)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{$pr->productImages[0]->path}}">
                                        <ul class="product__hover">
                                            <li><a href=""><img src="front/img/icon/heart.png" alt=""></a></li>
                                            <li><a href="javascript:addCart({{ $pr->id }})"><img src="front/img/icon/cart.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>{{$pr->name}}</h6>
                                        <a href="{{url("/shop/product/{$pr->id}")}}" class="add-cart">{{$pr->name}}</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>${{$pr->price}}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! $product->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>

            <div id="alert-container" class="hide">
                <div id="alert-content">
                    <div class="alert-icon">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                            <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </div>
                    <div class="alert-message"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
