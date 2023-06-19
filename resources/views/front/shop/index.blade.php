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
                                <form action="">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach($category as $ct)
                                                    <li><a href="shop/category/{{$ct->name}}" >{{$ct->name}}({{count($ct->products)}})</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">

                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                @foreach($brands as $brand)
                                                <div class="bc-item">
                                                    <label for="bc-{{$brand->id}}">
                                                        {{$brand->name}}
                                                        <input type="checkbox"
                                                               {{(request("brand")[$brand->id] ?? '') == 'on' ? 'checked' : ''}}
                                                               id="bc-{{$brand->id}}" name="brand[{{$brand->id}}]"
                                                        onchange="this.form.submit();">

                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="filter-widget collapse show" data-parent="#accordionExample">
                                    <div class="filter-range-wrap">
                                        <div class="range-slider">
                                            <div class="price-input">
                                                <input type="text" id="minamount" name="price_min">
                                                <input type="text" id="maxamount" name="price_max">
                                            </div>
                                        </div>
                                        <div
                                           class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                            data-min="10" data-max="999"
                                                data-min-value="{{str_replace('$','',request('price_min'))}}"
                                                data-max-value="{{str_replace('$','',request('price_max'))}}">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        </div>
                                    </div>
                                        <button type="submit" class="btn btn-dark" style="width: 100%; font-weight: 600">Filter</button>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">
                                                <label for="xs" class="{{request('size') == 'xs' ? 'active' : ''}}">xs
                                                    <input type="radio" id="xs" name="size" value="xs" onchange="this.form.submit();"
                                                    {{request('size') == 'xs' ? 'checked' : ''}}>
                                                </label>
                                                <label for="sm" class="{{request('size') == 's' ? 'active' : ''}}">s
                                                    <input type="radio" id="sm" name="size" value="s" onchange="this.form.submit();"
                                                        {{request('size') == 's' ? 'checked' : ''}}>
                                                </label>
                                                <label for="md" class="{{request('size') == 'm' ? 'active' : ''}}">m
                                                    <input type="radio" id="md" name="size" value="m" onchange="this.form.submit();"
                                                        {{request('size') == 'm' ? 'checked' : ''}}>
                                                </label>
                                                <label for="xl" class="{{request('size') == 'xl' ? 'active' : ''}}">xl
                                                    <input type="radio" id="xl" name="size" value="xl" onchange="this.form.submit();"
                                                        {{request('size') == 'xl' ? 'checked' : ''}}>
                                                </label>
                                                <label for="2xl" class="{{request('size') == '2xl' ? 'active' : ''}}">2xl
                                                    <input type="radio" id="2xl" name="size" value="2xl" onchange="this.form.submit();"
                                                        {{request('size') == '2xl' ? 'checked' : ''}}>
                                                </label>
                                                <label for="xxl" class="{{request('size') == 'xxl' ? 'active' : ''}}">xxl
                                                    <input type="radio" id="xxl" name="size" value="xxl" onchange="this.form.submit();"
                                                        {{request('size') == 'xxl' ? 'checked' : ''}}>
                                                </label>
                                            </div>
                                            <div class="shop__sidebar__size">
                                                <label for="38" class="{{request('size') == '38' ? 'active' : ''}}">38
                                                    <input type="radio" id="38" name="size" value="38" onchange="this.form.submit();"
                                                        {{request('size') == '38' ? 'checked' : ''}}>
                                                </label>
                                                <label for="39" class="{{request('size') == '39' ? 'active' : ''}}">39
                                                    <input type="radio" id="39" name="size" value="39" onchange="this.form.submit();"
                                                        {{request('size') == '39' ? 'checked' : ''}}>
                                                </label>
                                                <label for="40" class="{{request('size') == '40' ? 'active' : ''}}">40
                                                    <input type="radio" id="40" name="size" value="40" onchange="this.form.submit();"
                                                        {{request('size') == '40' ? 'checked' : ''}}>
                                                </label>
                                                <label for="41" class="{{request('size') == '41' ? 'active' : ''}}">41
                                                    <input type="radio" id="41" name="size" value="41" onchange="this.form.submit();"
                                                        {{request('size') == '41' ? 'checked' : ''}}>
                                                </label>
                                                <label for="42" class="{{request('size') == '42' ? 'active' : ''}}">42
                                                    <input type="radio" id="42" name="size" value="42" onchange="this.form.submit();"
                                                        {{request('size') == '42' ? 'checked' : ''}}>
                                                </label>
                                                <label for="43" class="{{request('size') == '43' ? 'active' : ''}}">43
                                                    <input type="radio" id="43" name="size" value="43" onchange="this.form.submit();"
                                                        {{request('size') == '43' ? 'checked' : ''}}>
                                                </label>
                                                <label for="44" class="{{request('size') == '44' ? 'active' : ''}}">44
                                                    <input type="radio" id="44" name="size" value="44" onchange="this.form.submit();"
                                                        {{request('size') == '44' ? 'checked' : ''}}>
                                                </label>
                                                <label for="45" class="{{request('size') == '45' ? 'active' : ''}}">45
                                                    <input type="radio" id="45" name="size" value="45" onchange="this.form.submit();"
                                                        {{request('size') == '45' ? 'checked' : ''}}>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">

                                            <div class="shop__sidebar__size">
                                                <label for="Product" class="{{request('tag') == 'Product' ? 'active' : ''}}">Product
                                                    <input type="radio" id="Product" name="tag" value="Product" onchange="this.form.submit();"
                                                        {{request('tag') == 'Product' ? 'checked' : ''}}>
                                                </label>
                                                <label for="Bags" class="{{request('tag') == 'Bags' ? 'active' : ''}}">Bags
                                                    <input type="radio" id="Bags" name="tag" value="Bags" onchange="this.form.submit();"
                                                        {{request('tag') == 'Bags' ? 'checked' : ''}}>
                                                </label>
                                                <label for="Shoes" class="{{request('tag') == 'Shoes' ? 'active' : ''}}">Shoes
                                                    <input type="radio" id="Shoes" name="tag" value="Shoes" onchange="this.form.submit();"
                                                        {{request('tag') == 'Shoes' ? 'checked' : ''}}>
                                                </label>
                                                <label for="Clothing" class="{{request('tag') == 'Clothing' ? 'active' : ''}}">Clothing
                                                    <input type="radio" id="Clothing" name="tag" value="Clothing" onchange="this.form.submit();"
                                                        {{request('tag') == 'v' ? 'checked' : ''}}>
                                                </label>
                                                <label for="Hats" class="{{request('tag') == 'Hats' ? 'active' : ''}}">Hats
                                                    <input type="radio" id="Hats" name="tag" value="Hats" onchange="this.form.submit();"
                                                        {{request('tag') == 'Hats' ? 'checked' : ''}}>
                                                </label>

                                                <label for="Accessories" class="{{request('tag') == 'Accessories' ? 'active' : ''}}">Accessories
                                                    <input type="radio" id="Accessories" name="tag" value="Accessories" onchange="this.form.submit();"
                                                        {{request('tag') == 'Accessories' ? 'checked' : ''}}>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">

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


                    </div>
                    <div class="row">
                        @foreach($product as $pr)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{$pr->productImages[0]->path}}">
                                        <ul class="product__hover">
                                            <li><a href=""><img src="front/img/icon/heart.png" alt=""></a></li>
                                            <li><a href="cart/add/{{$pr->id}}"><img src="front/img/icon/cart.png" alt=""></a></li>
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

        </div>
    </section>
    <!-- Shop Section End -->


@endsection
