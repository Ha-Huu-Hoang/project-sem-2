@extends('front.layout.master')
@section('title','Checkout')
@section('body')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url("/")}}">Home</a>
                            <a href="{{url("/shop")}}">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{url("/checkout")}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="{{url("/cart")}}" style="color: #1da1f2">Click
                                    here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name">
                                        @error("first_name")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name">
                                        @error("last_name")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country">
                                @error("country")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Street Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="street_address">
                                @error("street_address")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town_city">
                                @error("town_city")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postcode_zip">
                                @error("postcode_zip")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                        @error("phone")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email">
                                        @error("email")
                                        <p class="text-danger"><i>{{$message}}</i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach($carts as $item)
                                        <li>
                                            {{ $item->name }} x{{ $item->qty }}
                                            <span>$ {{ $item->price * $item->qty }}</span>
                                        </li>
                                    @endforeach

                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>${{$subtotal}}</span></li>
                                    <li>VAT 10%<span>$ {{$vatAmount}}</span></li>
                                    <li>Total <span>${{$total}}</span></li>
                                </ul>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        COD
                                        <input name="payment_method" type="radio" id="payment" value="COD" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input name="payment_method" type="radio" id="paypal" value="PayPal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="vnpay">
                                        VN PAY
                                        <input name="payment_method" type="radio" id="vnpay" value="VNPAY">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
